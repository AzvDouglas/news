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

    public function create()
    {
        $user = Auth::user();
        $noticia = new Noticia();
        return view('noticia.create', compact('noticia', 'user'));
    }

    public function edit(Noticia $noticia)
    {
        return view('noticia.edit', compact('noticia'));
    }
    public function store(Request $request)
    {
        dd($request->all());
    }
}
