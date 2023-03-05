<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function kullanicigoruntule()
    {
        $kullanici = User::all();
        return view('admin.kullanicilar.index',compact('kullanici'));
    }
}
