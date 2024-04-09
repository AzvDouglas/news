<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\User;

class NoticiaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $noticias = $user->noticias;
        return view('dashboard', compact('noticias'));
    }
}
//                    @foreach(auth()->user()->noticias as $noticia)
