<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siparis;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $siparisler = Siparis::where('user_id',Auth::id())->get();
        return view('frontend.siparisler.index', compact('siparisler'));
    }
}
