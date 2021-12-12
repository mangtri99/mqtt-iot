<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Detak extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getOksigenStatusAttribute(){
        $spo2 = $this->attributes['oksigen'];
        if($spo2<95)
            return 'Rendah';
        else
            return 'Normal';
    }

    public function getDetakStatusAttribute()
    {
        $bpm = $this->attributes['bpm'];

        if($bpm > 100 && Auth::user()->usia > 18)
            return 'Tinggi';
        elseif($bpm < 60 && Auth::user()->usia > 18)
            return 'Rendah';
        else
            return 'Normal';



        // if (($bpm < 70) && (Auth::user()->usia < 10))
        //     return 'Rendah';

        // elseif (($bpm > 70) && ($bpm < 120) && (Auth::user()->usia < 10))
        //     return 'Normal';
        // elseif (($bpm > 120) && (Auth::user()->usia < 10))
        //     return 'Tinggi';
        // elseif (($bpm < 60) && (Auth::user()->usia > 10))
        //     return 'Rendah';
        // elseif (($bpm > 60) && ($bpm < 100) && (Auth::user()->usia > 10))
        //     return 'Normal';
        // else
        //     return 'Tinggi';
    }
    public function bpm_notif($userId)
    {
        $bpm = $this->attributes['bpm'];
        $tgl_lahir = User::where('id', $userId)->first();
        $age = Carbon::parse($tgl_lahir->tanggal_lahir)->age;
        if($bpm > 100 && $age > 18)
            return 'Tinggi';
        elseif($bpm < 60 && $age > 18)
            return 'Rendah';
        else
            return 'Normal';
    }
}
