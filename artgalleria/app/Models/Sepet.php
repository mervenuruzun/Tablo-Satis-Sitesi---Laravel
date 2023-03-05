<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Urun;

class Sepet extends Model
{
    use HasFactory;
    protected $table = 'sepet';
    protected $fillable =[
        'user_id',
        'urun_id',
        'urun_adet',
    ];
    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id','id');
    }
}
