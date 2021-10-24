<?php

namespace App\Http\Controllers;

use App\Models\Suhu;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_total = User::where('is_admin', '=', 0)->count();
        $jumlah_pengukuran = Suhu::count();
        $daftar = User::where('is_admin', '=', 0)->get();
        return view('admin.home', compact('user_total', 'jumlah_pengukuran', 'daftar'));
    }

    public function daftaruser()
    {
        $daftar = User::where('is_admin', '=', 0)->get();
        return view('admin.daftaruser', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_avatar = User::where('id', '=', $id)->first();
        $user_detail = User::where('id', '=', $id)->with('detak', 'suhu', 'tekanan_darah')->get();
        $user_count = Suhu::where('user_id', '=', $id)->count();
        return view('admin.detailuser', compact('user_detail', 'user_count', 'user_avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
