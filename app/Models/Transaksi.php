<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class);
    }

    public function detailTransaksi(){
        return $this->hasMany(DetailTransaksi::class,'no_nota','no_nota');
    }

    public function atasNama(){
        return $this->hasOne(AtasNama::class,'no_nota','no_nota');
    }

    public function pengiriman(){
        return $this->hasMany(Pengiriman::class,'no_nota', 'no_nota');
    }

    public function pengambilan(){
        return $this->hasMany(Pengambilan::class,'no_nota', 'no_nota');
    }
}
