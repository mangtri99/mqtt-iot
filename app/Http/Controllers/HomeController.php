<?php

namespace App\Http\Controllers;

use App\Models\Detak;
use App\Models\Suhu;
use App\Models\User;
use App\Models\TekananDarah;
use Illuminate\Support\Facades\Auth;

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
        $detak = Detak::where('user_id', Auth::user()->id)
            ->latest()->first();
        $tekanan = TekananDarah::where('user_id', Auth::user()->id)
            ->latest()->first();

        $riwayat_tekanan = TekananDarah::latest()->paginate(5);
        // return $suhu;
        return view('dashboard', [
            'suhu' => $suhu,
            'detak' => $detak,
            'tekananDarah' => $tekanan,
            'riwayat_tekanan' => $riwayat_tekanan,
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
        $data_detak = Detak::latest()->limit(5)->get();
        return response()->json($data_detak);
    }

    public function chart_suhu()
    {
        $data_suhu = Suhu::latest()->limit(5)->get();
        return response()->json($data_suhu);
    }

    public function chart_tensi()
    {
        $data_tensi = TekananDarah::latest()->limit(5)->get();
        return response()->json($data_tensi);
    }
}
