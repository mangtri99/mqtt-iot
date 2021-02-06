<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Detak;
use App\Models\Suhu;
use App\Models\TekananDarah;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $data_suhu = Suhu::where('user_id', auth()->id())->latest()->first();
        $data_detak = Detak::where('user_id', auth()->id())->latest()->first();
        $data_tekanan = TekananDarah::where('user_id', auth()->id())->latest()->first();
        return view('profile.edit', [
            'last_suhu_user' => $data_suhu,
            'last_detak_user' => $data_detak,
            'last_tekanan_user' => $data_tekanan
        ]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
