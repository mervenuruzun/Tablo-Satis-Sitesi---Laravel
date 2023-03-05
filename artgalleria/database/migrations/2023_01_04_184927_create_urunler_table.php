<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategori_id');
            $table->string('isim');
            $table->mediumText('kucuk_aciklama');
            $table->longText('aciklama');
            $table->string('orjinal_fiyat');
            $table->string('satis_fiyati');
            $table->string('gorsel');
            $table->string('adet');
            $table->tinyInteger('status');
            $table->mediumText('meta_baslik');
            $table->mediumText('meta_keywords');
            $table->mediumText('meta_aciklama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urunler');
    }
};
