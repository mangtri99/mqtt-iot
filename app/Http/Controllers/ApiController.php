<?php

namespace App\Http\Controllers;

use App\Models\Suhu;
use App\Models\User;
use App\Models\Detak;
use App\Mail\NotifyMail;
use App\Models\TekananDarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'suhu' => $request->suhu,
            'bpm' => $request->bpm,
            'spo2' => $request->oksigen,
            'sistole' => $request->sistole,
            'diastole' => $request->diastole,
            'email' => $email_user
        ];

        Mail::to('mangtri93@gmail.com')->send(new NotifyMail($data));

        return response()->json([
            'status' => 'success'
        ]);
    }
}
