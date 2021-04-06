<?php

namespace App\Models;

use App\Models\Suhu;
use App\Models\Detak;
use App\Models\TekananDarah;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'alamat',
        'no_telp',
        'nik',
        'golongan_darah',
        'password',
        'no_pasien',
        'tanggal_lahir',
        'jenis_kelamin'
    ];
    protected $golongan_darah = ['A', 'B', 'AB', 'O'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // protected $with = ['detak', 'suhu', 'tekanan_darah'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsiaAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->age;
    }

    public function getTglLahirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->format("d, M Y");
    }

    public function detak()
    {
        return $this->hasMany(Detak::class)->orderBy('created_at', 'desc');
    }

    public function suhu()
    {
        return $this->hasMany(Suhu::class)->orderBy('created_at', 'desc');
    }

    public function tekanan_darah()
    {
        return $this->hasMany(TekananDarah::class)->orderBy('created_at', 'desc');
    }

    public function getAvatarUserAttribute()
    {
        if ($this->attributes['jenis_kelamin'] == 'Laki-Laki') {
            return url('assets\img\user_male.png');
        } else {
            return url('assets\img\user_female.png');
        }
    }
}
