<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Noticia;

class CreateNewsForm extends Component
{
    use WithFileUploads;

    public $titulo;
    public $descricao;
    public $imagem;
    public Noticia $noticia;

    public function save()
    {
        // Verifique se a $imagem é um arquivo enviado ou uma URL
        if ($this->imagem instanceof \Illuminate\Http\UploadedFile) {
            $imagemPath = $this->imagem->store('imagens', 'public');
        } else {
            // Se for uma URL, use-a diretamente como caminho da imagem
            $imagemPath = $this->imagem;
        }
        //dd($imagemPath);

        Noticia::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'imagem' => $imagemPath,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Notícia criada com sucesso.');

        return $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.forms.create-news-form');
    }
}
