<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pembayarans';
    protected $dates = ['deleted_at'];

    public function tagihan()
    {
        return $this->hasMany(Tagihan::class, 'id', 'id_tagihan')->withTrashed();
    }

    public function mahasiswa()
    {
        return $this->hasMany(User::class, 'id', 'id')->withTrashed();
    }
}
