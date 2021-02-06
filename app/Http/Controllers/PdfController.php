<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Suhu;
use App\Models\Detak;
use App\Models\TekananDarah;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;


class PdfController extends Controller
{
    public function exportSuhu()
    {
        $data_suhu = Suhu::latest()->limit(10)->get();
        $data_detak = Detak::latest()->limit(10)->get();
        $data_tekanan = TekananDarah::latest()->limit(10)->get();

        $user_login = Auth::id();
        $data_rangkum = User::where('id', '=', $user_login)->with('detak', 'suhu', 'tekanan_darah')->get();

        $user = auth()->user()->name;
        $suhu = Suhu::where('user_id', Auth::user()->id)
            ->latest()->first();
        $total_pengukuran = Suhu::count();
        $detak = Detak::where('user_id', Auth::user()->id)
            ->latest()->first();
        $tekanan = TekananDarah::where('user_id', Auth::user()->id)
            ->latest()->first();

        $suhu_tinggi = Suhu::orderBy('suhu', 'desc')->first();
        $suhu_rendah = Suhu::orderBy('suhu', 'asc')->first();
        $suhu_rata2 = Suhu::avg('suhu');

        $detak_tinggi = Detak::orderBy('bpm', 'desc')->first();
        $detak_rendah = Detak::orderBy('bpm', 'asc')->first();
        $detak_rata2 = Detak::avg('bpm');

        $oksigen_tinggi = Detak::orderBy('oksigen', 'desc')->first();
        $oksigen_rendah = Detak::orderBy('oksigen', 'asc')->first();
        $oksigen_rata2 = Detak::avg('oksigen');

        $tekanan_tinggi = TekananDarah::orderBy('sistole', 'desc')->first();
        $tekanan_rendah = TekananDarah::orderBy('sistole', 'asc')->first();
        $tekanan_rata2_sistole = TekananDarah::avg('sistole');
        $tekanan_rata2_diastole = TekananDarah::avg('diastole');
        // view()->share('data_suhu', $data_suhu);
        $pdf = PDF::loadview('pdf.report', [
            'data_rangkum' => $data_rangkum,
            'data_suhu' => $data_suhu,
            'data_detak' => $data_detak,
            'data_tekanan' => $data_tekanan,
            'suhu_tinggi' => $suhu_tinggi,
            'suhu_rendah' => $suhu_rendah,
            'suhu_rata2' => $suhu_rata2,
            'detak_tinggi' => $detak_tinggi,
            'detak_rendah' => $detak_rendah,
            'detak_rata2' => $detak_rata2,
            'oksigen_tinggi' => $oksigen_tinggi,
            'oksigen_rendah' => $oksigen_rendah,
            'oksigen_rata2' => $oksigen_rata2,
            'tekanan_tinggi' => $tekanan_tinggi,
            'tekanan_rendah' => $tekanan_rendah,
            'tekanan_rata2_sistole' => $tekanan_rata2_sistole,
            'tekanan_rata2_diastole' => $tekanan_rata2_diastole,
            'total_pengukuran' => $total_pengukuran
        ]);
        // $user_login = Auth::id();
        // $data = User::where('id', '=', $user_login)->with('detak', 'suhu', 'tekanan_darah')->get();
        // return $data[0]->tekanan_darah[0]->sistole;
        return $pdf->download('Riwayat-' . $user . '.pdf');
    }
}
