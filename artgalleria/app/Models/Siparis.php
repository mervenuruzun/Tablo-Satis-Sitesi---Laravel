<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siparis extends Model
{
    use HasFactory;
    protected $table = 'siparis';
    protected $fillable =[
        'user_id',
        'ad',
        'soyad',
        'email',
        'telefon',
        'sehir',
        'ilce',
        'adres',
        'status',
        'takip_no',
        'toplam',

    ];
}
