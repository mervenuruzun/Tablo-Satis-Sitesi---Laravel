<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiparisItem extends Model
{
    use HasFactory;
    protected $table = 'siparis_item';
    protected $fillable =[
        'siparis_id',
        'urun_id',
        'adet',
        'fiyat',
    ];
}
