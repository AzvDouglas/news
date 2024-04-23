<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Noticia as NoticiaModel;

class Noticias extends Component
{
    public $noticias;
    public NoticiaModel $noticia;
    public string $descricao;
    public string $titulo = ' ';
    public $imagem;

    protected $rules = [
        'titulo' => 'required',
        'descricao' => 'required',
        'imagem' => 'nullable|image|max:1024', // Max size 1MB for image
    ];

    protected $messages = [
        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O campo título deve ter no mínimo :min caracteres.',
        'descricao.required' => 'O campo descrição é obrigatório.',
        'descricao.min' => 'O campo descrição deve ter no mínimo :min caracteres.',
        'imagem' => 'Faça o upload de um arquivo de imagem válido por favor.'
    ];

    public function mount()
    {
        $user = Auth::user();
        $this->noticias = $user->noticias->sortByDesc('created_at');
    }
  
    public function render()
    {
        return view('livewire.noticias');
    }
    


    public function edit($noticiaId)
    {
        $noticiaEdit = NoticiaModel::find($noticiaId);
        $this->titulo = $noticiaEdit->titulo;
        $this->descricao = $noticiaEdit->descricao;
        $this->imagem = $noticiaEdit->imagem;    }

    public function updated($propertyName)
    {
        if ($propertyName === 'imagem') {
            $this->rules['imagem'] = $this->imagem instanceof UploadedFile
                ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'sometimes|url';
        }
        $this->validateOnly($propertyName);
    }
}
