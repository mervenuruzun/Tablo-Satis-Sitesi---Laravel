<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Urun;
use Illuminate\Support\Facades\File;

class UrunController extends Controller
{
    public function index()
    {
        $urun=Urun::all();
        return view('admin.urunler.index', compact('urun'));
    }
    public function urun_ekle()
    {
        $kategori=Kategori::all();
        return view('admin.urunler.urun_ekle', compact('kategori'));
    }
    public function ekle(Request $request)
    {
        $urun = new Urun();
        if($request->hasFile('gorsel'))
        {
            $file = $request->file('gorsel');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/urun/',$filename);
            $urun->gorsel=$filename;
        }

        $urun->kategori_id=$request->input('kategori_id');
        $urun->isim= $request->input('name');
        $urun->kucuk_aciklama=$request->input('kisa_aciklama');
        $urun->aciklama= $request->input('aciklama');
        $urun->orjinal_fiyat= $request->input('orijinal_fiyat');
        $urun->satis_fiyati= $request->input('satis_fiyati');
        $urun->adet= $request->input('adet');
        $urun->status= $request->input('status') == TRUE ? '1':'0';
        $urun->meta_baslik= $request->input('meta_baslik');
        $urun->meta_aciklama= $request->input('meta_aciklama');
        $urun->meta_keywords= $request->input('meta_keywords');
        $urun->save();
        return redirect('urunler')->with('status',"Ürün Eklendi.");
    }

    public function urun_duzenle($id)
    {
        $urun = Urun::find($id);
        return view('admin.urunler.urun_duzenle',compact('urun'));
    }

    public function urun_duzeni(Request $request, $id)
    {
        $urun = Urun::find($id);

        if ($request->hasFile('gorsel')) {
            $path = 'assets/uploads/urun/'.$urun->gorsel;
            if (File::exist($path)) {
                File::delete($path);
            }

            $file = $request->file('gorsel');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/urun/',$filename);
            $urun->gorsel = $filename;
        }

        $urun->isim = $request->input('name');
        $urun->kucuk_aciklama = $request->input('kisa_aciklama');
        $urun->aciklama = $request->input('aciklama');
        $urun->orjinal_fiyat = $request->input('orijinal_fiyat');
        $urun->satis_fiyati = $request->input('satis_fiyati');
        $urun->adet = $request->input('adet');
        $urun->status= $request->input('status') == TRUE ? '1':'0';
        $urun->meta_baslik = $request->input('meta_baslik');
        $urun->meta_aciklama = $request->input('meta_aciklama');
        $urun->meta_keywords = $request->input('meta_keywords');
        $urun->save();
        return redirect('urunler')->with('status', "Ürün Güncellendi.");
    }

    public function urun_sil($id)
    {
        $urun = Urun::find($id);
        $urun->delete();
        return redirect('urunler')->with('status',"Ürün Silindi.");
    }

}
