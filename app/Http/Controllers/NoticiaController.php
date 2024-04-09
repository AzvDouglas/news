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
        // Recupera todas as notícias do usuário logado
        $user = Auth::user();
        $noticias = $user->noticias;

        // Retorna a view do dashboard com as notícias do usuário
        return view('dashboard', compact('noticias'));
    }
}
