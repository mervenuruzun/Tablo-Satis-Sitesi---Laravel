<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Urun extends Model
{
    use HasFactory;
    protected $table = 'urunler';
    protected $fillable =[
        'kategori_id',
        'isim',
        'kucuk_aciklama',
        'aciklama',
        'orjinal_fiyat',
        'satis_fiyati',
        'gorsel',
        'adet',
        'status',
        'meta_baslik',
        'meta_keywords',
        'meta_aciklama',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id' , 'id');
    }
}

