<?php

namespace App\Http\Controllers;

use App\Models\Detak;
use App\Models\Suhu;
use App\Models\TekananDarah;
use App\Models\User;
use Illuminate\Http\Request;

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
        $tekanan->keterangan = 'normal';
        $tekanan->user_id = $request->user_id;

        $suhu->save();
        $detak->save();
        $tekanan->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
