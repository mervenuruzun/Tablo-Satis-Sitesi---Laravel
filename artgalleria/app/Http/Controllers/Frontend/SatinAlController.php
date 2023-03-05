<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sepet;
use App\Models\Urun;
use App\Models\Siparis;
use App\Models\SiparisItem;
use Illuminate\Support\Facades\Auth;

class SatinAlController extends Controller
{
    public function index()
    {
        $sepet = Sepet::where('user_id',Auth::id())->get();
        return view('frontend.satinal', compact('sepet'));
    }

    public function placeorder( Request $request)
    {
        $siparis = new Siparis();
        $siparis->user_id = Auth::id();
        $siparis->ad = $request->input('ad');
        $siparis->soyad = $request->input('soyad');
        $siparis->email = $request->input('email');
        $siparis->telefon = $request->input('telefon');
        $siparis->sehir = $request->input('sehir');
        $siparis->ilce = $request->input('ilce');
        $siparis->adres = $request->input('adres');

        $total = 0;
        $sepet_total = Sepet::where('user_id',Auth::id())->get();
        foreach($sepet_total as $item)
        {
            $total += $item->urun->satis_fiyati * $item->urun_adet;
        }

        $siparis->toplam = $total;

        $siparis->takip_no ='artgalleria'.rand(1111,9999);
        $siparis->save();

        $sepet_item =  Sepet::where('user_id',Auth::id())->get();
        foreach($sepet_item as $item)
        {
            SiparisItem::create([
                'siparis_id'=>$siparis->id,
                'urun_id'=>$item->urun_id,
                'adet'=>$item->urun_adet,
                'fiyat'=>$item->urun->satis_fiyati,
            ]);

            $urun = Urun::where('id',$item->urun_id)->first();
            $urun->update();
        }

        $sepet_item =  Sepet::where('user_id',Auth::id())->get();
        Sepet::destroy($sepet_item);
        return redirect('/')->with('status',"Sipariş Alındı");
    }
}
