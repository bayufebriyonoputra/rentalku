<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'merk';
    protected $guarded = ['id'];


    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }
}
