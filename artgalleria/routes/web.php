<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Admin\SiparisController;
use App\Http\Controllers\Frontend\SepetController;
use App\Http\Controllers\Frontend\SatinAlController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',[FrontendController::class , 'index']);
Route::get('/kategoriler',[FrontendController::class , 'kategoriler']);
Route::get('kategori/{slug}',[FrontendController::class , 'kategorilerigoster']);
Route::get('kategori/{slug}/{isim}',[FrontendController::class , 'urungoruntule']);

Auth::routes();

//Route::get('/home', [HomeController::class, 'index']);



Route::middleware(['auth'])->group(function (){

    Route::post('/add-to-cart', [SepetController::class, 'urunekle']);
    Route::post('/delete-cart-item', [SepetController::class, 'urunsil']);
    Route::post('update-sepet', [SepetController::class, 'sepetguncelle']);

    Route::get('/sepet', [SepetController::class, 'sepetgoruntule']);
    Route::get('/satinal', [SatinAlController::class, 'index']);
    Route::post('place-order', [SatinAlController::class, 'placeorder']);
    Route::get('siparislerim', [UserController::class, 'index']);
});


/* isAdmin-> Kernel.php içerisinde */
/**
 * @return string
 */
function getClass(): string
{
    return DashboardController::class;
}

Route::group(['middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard', [AdminController::class, 'indexe']);

    Route::get('kategori', [KategoriController::class, 'index']);
    Route::get('kategori_ekle', [KategoriController::class, 'kategori_ekle']);
    Route::post('insert_kategori', [KategoriController::class, 'ekle']);

    Route::get('kategori_duzenle/{id}', [KategoriController::class, 'kategori_duzenle']);
    Route::put('kategori_duzen/{id}', [KategoriController::class, 'kategori_duzen']);
    Route::get('kategori_sil/{id}', [KategoriController::class, 'kategori_sil']);

    Route::get('urunler',[UrunController::class, 'index']);
    Route::get('urun_ekle',[UrunController::class, 'urun_ekle']);
    Route::post('insert_urun',[UrunController::class, 'ekle']);

    Route::get('urun_duzenle/{id}', [UrunController::class, 'urun_duzenle']);
    Route::put('urun_duzen/{id}', [UrunController::class, 'urun_duzeni']);
    Route::get('urun_sil/{id}', [UrunController::class, 'urun_sil']);


    Route::get('kullanicilar', [DashboardController::class, 'kullanicigoruntule']);
    Route::get('siparisler', [SiparisController::class, 'index']);
    Route::get('admin/siparisgoruntule/{id}', [SiparisController::class, 'siparisgoruntule']);

});
