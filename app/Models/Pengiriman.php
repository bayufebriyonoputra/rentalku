<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pengrimans';

    public function karyawan(){
        return $this->belongsTo(Karyawan::class);
    }
}
