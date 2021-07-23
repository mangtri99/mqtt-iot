<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TekananDarah extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['user'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTekananStatusAttribute()
    {
        $sistole = $this->attributes['sistole'];
        $diastole = $this->attributes['diastole'];
        // $usia = auth()->user()->usia;
        if ($sistole < 90 && $diastole < 60)
            return 'Hipotensi';
        else if ($sistole > 90 && $sistole < 120 && $diastole > 59 && $diastole < 80)
            return 'Normal';
        else if ($sistole >= 120 && $sistole < 140 && $diastole > 79 && $diastole < 90)
            return 'Pra-Hipertensi';
        else if ($sistole >= 140 && $sistole < 160 && $diastole > 89 && $diastole < 100)
            return 'Hipertensi Tk. I';
        else if ($sistole >= 160 && $diastole >= 100)
            return 'Hipertensi Tk. II';
        else
            return 'Normal';
        //anak-anak
        // if ($sistole > 120 && $diastole >= 80 && $usia < 18)
        //     return 'Tinggi';

        // else if ($sistole < 80 && $diastole < 50 && $usia < 18)
        //     return 'Rendah';

        // else if ($sistole >= 80 && $sistole <= 120 && $diastole >= 50 && $diastole <= 80)
        //     return 'Normal';

        // //dewasa
        // else if ($sistole > 135 && $diastole > 80 && $usia >= 18)
        //     return 'Tinggi';

        // else if ($sistole < 95 && $diastole < 60 && $usia >= 18)
        //     return 'Rendah';

        // else if ($sistole >= 95 && $sistole <= 135 && $diastole >= 60 && $diastole <= 80 && $usia >= 18)
        //     return 'Normal';

        // //lanjut usia
        // else if ($sistole > 145 && $diastole > 90 && $usia >= 60)
        //     return 'Tinggi';

        // else if ($sistole >= 70 && $sistole <= 145 && $diastole >= 70 && $diastole <= 90 && $usia >= 60)
        //     return 'Normal';

        // else if ($sistole < 95 && $diastole < 70 && $usia >= 60)
        //     return 'Rendah';
        // else if ($sistole == null && $diastole == null)
        //     return 'No Data';
        // else
        //     return 'Normal';
    }
}
