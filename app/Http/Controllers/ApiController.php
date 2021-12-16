<?php

namespace App\Http\Controllers;

use App\Models\Suhu;
use App\Models\User;
use App\Models\Detak;
use Twilio\Rest\Client;
use App\Mail\NotifyMail;
use App\Models\TekananDarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\WhatsappNotification;

class ApiController extends Controller
{
    public function show(User $user)
    {
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $suhu = new Suhu();
        $suhu->suhu = $request->suhu;
        $suhu->user_id = $request->user_id;

        $detak = new Detak();
        $detak->bpm = $request->bpm;
        $detak->oksigen = $request->oksigen;
        $detak->user_id = $request->user_id;

        $tekanan = new TekananDarah();
        $tekanan->sistole = $request->sistole;
        $tekanan->diastole = $request->diastole;
        $tekanan->user_id = $request->user_id;

        $suhu->save();
        $detak->save();
        $tekanan->save();

        $email_user = User::where('id', $request->user_id)->first();

        $data = [
            'date' => now(),
            'suhu' => $suhu->suhu,
            'status_suhu' => $suhu->suhu_status,
            'bpm' => $detak->bpm,
            'status_bpm' => $detak->bpm_notif($request->user_id),
            'spo2' => $detak->oksigen,
            'status_spo2' => $detak->oksigen_status,
            'sistole' => $tekanan->sistole,
            'diastole' => $tekanan->diastole,
            'status_tekanan' => $tekanan->tekanan_notif($request->user_id)
        ];

        Mail::to($email_user->email)->send(new NotifyMail($data));
        // $request->user()->notify(new WhatsappNotification($data));


        return response()->json([
            'status' => 'success'
        ]);
    }
}
