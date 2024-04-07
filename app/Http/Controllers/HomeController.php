<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::paginate(6);
        return view('home', compact('noticias'));
    }
}
