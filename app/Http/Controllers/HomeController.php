<?php

namespace App\Http\Controllers;

use App\Models\Detak;
use App\Models\Suhu;
use App\Models\User;
use App\Models\TekananDarah;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
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

        // return $suhu;
        return view('dashboard', [
            'suhu' => $suhu,
            'detak' => $detak,
            'tekananDarah' => $tekanan,
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
    }
    public function riwayat_suhu()
    {
        return view('riwayat.suhu');
    }
    public function riwayat_detak()
    {
        return view('riwayat.detak');
    }
    public function riwayat_tekanan()
    {
        return view('riwayat.tekanan-darah');
    }

    public function chart_detak()
    {
        // $query = DB::table('detaks')->orderBy('created_at', 'desc')->take(10);
        // $ordered = $query->reorder()->get();
        $data_detak = Detak::latest()->limit(10)->get();
        // $urut_data = $data_detak->sortBy('bpm');
        // dd($query);
        return response()->json($data_detak);
    }

    public function chart_suhu()
    {
        $data_suhu = Suhu::latest()->limit(10)->get();

        return response()->json($data_suhu);
    }

    public function chart_tensi()
    {
        $data_tensi = TekananDarah::latest()->limit(10)->get();
        return response()->json($data_tensi);
    }

    public function test()
    {
        $user_login = Auth::id();
        $data = User::where('id', '=', $user_login)->with('detak', 'suhu', 'tekanan_darah')->get();
        return $data[0]->tekanan_darah[0]->sistole;
    }
}
