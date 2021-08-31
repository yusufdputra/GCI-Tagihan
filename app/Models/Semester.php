<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semester extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'semesters';
    protected $dates = ['deleted_at'];

    public function tagihan()
    {
        return $this->belongsToMany(Tagihan::class);
    }
}
