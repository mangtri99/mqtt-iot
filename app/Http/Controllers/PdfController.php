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
    public function exportSuhu($user)
    {
        // $data_suhu = Suhu::latest()->limit(10)->get();
        // $data_detak = Detak::latest()->limit(10)->get();
        // $data_tekanan = TekananDarah::latest()->limit(10)->get();
        // $detak = Detak::where('user_id', Auth::user()->id)
        //     ->latest()->first();
        // $tekanan = TekananDarah::where('user_id', Auth::user()->id)
        //     ->latest()->first();
        // $suhu = Suhu::where('user_id', Auth::user()->id)
        // ->latest()->first();

        // if ($id) {
        //     $user = Auth::id();
        // } else {
        //     $user = $id;
        // }
        $user_export = User::find($user);
        // $last_update = User::where('id', '=', $user)->with('detak', 'suhu', 'tekanan_darah')->latest()->first();
        $last_suhu = Suhu::where('user_id', '=', $user)->orderBy('created_at', 'DESC')->first();
        $last_detak_sp02 = Detak::where('user_id', '=', $user)->orderBy('created_at', 'DESC')->first();
        $last_tekanan = TekananDarah::where('user_id', '=', $user)->orderBy('created_at', 'DESC')->first();

        $data_rangkum = User::where('id', '=', $user)->with('detak', 'suhu', 'tekanan_darah')->limit(10)->get();

        $total_pengukuran = Suhu::where('user_id', '=', $user)->count();

        $suhu_tinggi = Suhu::where('user_id', '=', $user)->orderBy('suhu', 'desc')->first();
        $suhu_rendah = Suhu::where('user_id', '=', $user)->orderBy('suhu', 'asc')->first();
        $suhu_rata2 = Suhu::where('user_id', '=', $user)->avg('suhu');

        $detak_tinggi = Detak::where('user_id', '=', $user)->orderBy('bpm', 'desc')->first();
        $detak_rendah = Detak::where('user_id', '=', $user)->orderBy('bpm', 'asc')->first();
        $detak_rata2 = Detak::where('user_id', '=', $user)->avg('bpm');

        $oksigen_tinggi = Detak::where('user_id', '=', $user)->orderBy('oksigen', 'desc')->first();
        $oksigen_rendah = Detak::where('user_id', '=', $user)->orderBy('oksigen', 'asc')->first();
        $oksigen_rata2 = Detak::where('user_id', '=', $user)->avg('oksigen');

        $tekanan_tinggi = TekananDarah::where('user_id', '=', $user)->orderBy('sistole', 'desc')->first();
        $tekanan_rendah = TekananDarah::where('user_id', '=', $user)->orderBy('sistole', 'asc')->first();
        $tekanan_rata2_sistole = TekananDarah::where('user_id', '=', $user)->avg('sistole');
        $tekanan_rata2_diastole = TekananDarah::where('user_id', '=', $user)->avg('diastole');
        // view()->share('data_suhu', $data_suhu);
        if ($total_pengukuran != 0) {
            $pdf = PDF::loadview('pdf.report', [
                'last_suhu' => $last_suhu,
                'last_detak' => $last_detak_sp02,
                'last_tekanan' => $last_tekanan,
                'data_rangkum' => $data_rangkum,
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
                'total_pengukuran' => $total_pengukuran,
                'user_export' => $user_export
            ]);
            return $pdf->download('Riwayat-' . $user_export['name'] . '.pdf');
        } else {
            return redirect()->back()->with('error', 'Anda belum pernah melakukan pengukuran, Cek Kesehatan Anda secara rutin');
        }
        // $user_login = Auth::id();
        // $data = User::where('id', '=', $user_login)->with('detak', 'suhu', 'tekanan_darah')->get();
        // return $data[0]->tekanan_darah[0]->sistole;
    }
}
