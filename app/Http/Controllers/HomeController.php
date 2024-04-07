<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::orderBy('created_at', 'desc')->paginate(6);
        //dd($noticias);
        return view('home', compact('noticias'));
    }
}
