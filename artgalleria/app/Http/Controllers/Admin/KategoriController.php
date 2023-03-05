<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }
    public function kategori_ekle()
    {
        return view('admin.kategori.kategori_ekle');
    }

    public function ekle(Request $request)
    {
        $kategori = new Kategori();
        if($request->hasFile('gorsel'))
        {
            $file = $request->file('gorsel');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/kategori/',$filename);
            $kategori->gorsel=$filename;
        }

        $kategori->isim= $request->input('name');
        $kategori->slug= $request->input('slug');
        $kategori->aciklama= $request->input('aciklama');
        $kategori->meta_baslik= $request->input('meta_baslik');
        $kategori->meta_aciklama= $request->input('meta_aciklama');
        $kategori->meta_keywords= $request->input('meta_keywords');
        $kategori->save();
        return redirect('/kategori')->with('status',"Kategori Eklendi.");
    }

    public function kategori_duzenle($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.kategori_duzenle',compact('kategori'));
    }
    public function kategori_duzen(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        if($request->hasFile('gorsel'))
        {
            $path = 'assets/uploads/kategori/'.$kategori->gorsel;
            if(File::exist($path))
            {
                File::delete($path);
            }

            $file = $request->file('gorsel');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/kategori/',$filename);
            $kategori->gorsel=$filename;
        }

        $kategori->isim= $request->input('name');
        $kategori->slug= $request->input('slug');
        $kategori->aciklama= $request->input('aciklama');
        $kategori->meta_baslik= $request->input('meta_baslik');
        $kategori->meta_aciklama= $request->input('meta_aciklama');
        $kategori->meta_keywords= $request->input('meta_keywords');
        $kategori->save();
        return redirect('kategori')->with('status',"Kategori Düzenlendi.");
    }

    public function kategori_sil($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('kategori')->with('status',"Kategori Silindi.");
    }
}
