<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipe extends Model
{
    use HasFactory;

    protected $table = 'tipe';
    protected $guarded = ['id'];

    public function merk(){
        return $this->belongsTo(Merk::class);
    }
}
