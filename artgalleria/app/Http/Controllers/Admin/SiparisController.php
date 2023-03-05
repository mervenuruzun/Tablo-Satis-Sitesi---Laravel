<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparis;

class SiparisController extends Controller
{
    public function index()
    {
        $siparis = Siparis::where('status','0')->get();
        return view('admin.siparisler.index',compact('siparis'));
    }

    public function siparisgoruntule($id)
    {
        return view('admin.siparisler.goruntule');
    }
}
