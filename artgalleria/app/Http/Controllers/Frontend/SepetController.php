<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Sepet;
use App\Models\Urun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SepetController extends Controller
{
    public function urunekle(Request $request)
    {
        $urun_id = $request->input('urun_id');
        $urun_adet = $request->input('urun_adet');

        if(Auth::check())
        {
            $urun_check = Urun:: where('id',$urun_id)->first();

            if($urun_check)
            {
                if(Sepet::where('urun_id',$urun_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $urun_check->isim . " Tablosu Sepette Bulunuyor"]);
                }
                else
                {
                    $cartItem = new Sepet();
                    $cartItem->urun_id = $urun_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->urun_adet = $urun_adet;
                    $cartItem->save();
                    return response()->json(['status' => $urun_check->isim . " Sepete Eklendi"]);
                }
            }
        }
        else
        {
            return response()->json(['status'=>"Giriş Yap"]);
        }
    }

    public function sepetgoruntule()
    {
        $sepet = Sepet::where('user_id',Auth::id())->get();
        return view('frontend.sepet',compact('sepet'));
    }


    public function urunsil(Request $request)
    {
        if(Auth::check())
        {
            $urun_id = $request->input('urun_id');
            if(Sepet::where('urun_id', $urun_id)->where('user_id',Auth::id())->exists())
            {
                $urunItem = Sepet::where('urun_id',$urun_id)->where('user_id',Auth::id())->first();
                $urunItem->delete();
                return response()->json(['status'=>"Ürün"]);
            }
        }
        else
        {
            return response()->json(['status'=>"Giriş Yap"]);
        }

    }

    public function sepetguncelle(Request $request)
    {
        $urun_id = $request->input('urun_id');
        $urun_adeti= $request->input('urun_adet');

        if(Auth::check())
        {
            if(Sepet::where('urun_id', $urun_id)->where('user_id',Auth::id())->exists())
            {
                $sepet = Sepet::where('urun_id', $urun_id)->where('user_id',Auth::id())->first();
                $sepet->urun_adet = $urun_adeti;
                $sepet->update();
                return response()->json(['status'=>"Ürün Güncellendi"]);
            }
        }
    }
}
