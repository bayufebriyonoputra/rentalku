<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPaket extends Model
{
    use HasFactory;

    protected $table = 'detail_paket';
    protected $guarded = ['id'];

    public function tipe(){
        return $this->belongsTo(Tipe::class);
    }
}
