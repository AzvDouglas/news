<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
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
        if ($this->imagem instanceof UploadedFile) {
            $imagemPath = $this->imagem->store('imagens', 'public');
        } else {
            $imagemPath = $this->imagem;
        }

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
