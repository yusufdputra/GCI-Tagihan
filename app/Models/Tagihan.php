<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tagihan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tagihans';
    protected $dates = ['deleted_at'];

    public function semester()
    {
        return $this->hasMany(Semester::class, 'id', 'id_semester')->withTrashed();
    }
}
