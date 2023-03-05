<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Urun;
use App\Models\Kategori;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $urun = Urun::all();
        return view('frontend.index', compact('urun'));
    }

    public function kategoriler()
    {
        $kategori = Kategori::all();
        return view('frontend.kategori', compact('kategori'));
    }

    public function kategorilerigoster($slug)
    {
        if (Kategori::where('slug',$slug)->exists())
        {
            $kategori = Kategori::where('slug', $slug)->first();
            $urun = Urun::where('kategori_id', $kategori->id)->where('status','0')->get();
            return view('frontend.urunler.index', compact('kategori','urun'));
        }
        else
        {
            return redirect('/')->with('status',"Slug bulunmuyor.");
        }
    }

    public function urungoruntule($slug, $isim)
    {
        if (Kategori::where('slug', $slug)->exists())
        {
            if(Urun::where('isim', $isim)->exists())
            {
                $urun = Urun::where('isim', $isim)->first();
                return view('frontend.urunler.view', compact('urun'));
            }
            else
            {
                return redirect('/')->with('status',"Ürün bulunmuyor.");
            }
        }

    }
}
