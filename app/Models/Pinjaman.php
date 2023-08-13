<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjamans';
    protected $guarded = ['id'];

    public function karyawan(){
        return $this->belongsTo(Karyawan::class);
    }
}
