<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suhu extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSuhuStatusAttribute()
    {
        $suhu = $this->attributes['suhu'];

        if($suhu > 37.5)
            return 'Tinggi';
        elseif($suhu < 36.0)
            return 'Rendah';
        else
            return 'Normal';
    }
}
