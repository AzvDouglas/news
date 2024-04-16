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

    protected $rules = [
        'titulo' => 'required|min:3',
        'descricao' => 'required|min:10',
    ];

    protected $messages = [
        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O campo título deve ter no mínimo :min caracteres.',
        'descricao.required' => 'O campo descrição é obrigatório.',
        'descricao.min' => 'O campo descrição deve ter no mínimo :min caracteres.',
    ];

    public function updated($propertyName)
    {
        // Se o campo atualizado for 'imagem', adicionamos ou removemos a regra 'image' conforme necessário
        if ($propertyName === 'imagem') {
            $this->rules['imagem'] = $this->imagem instanceof \Illuminate\Http\UploadedFile
                ? 'image|mimes:jpeg,png,jpg,gif|max:2048'
                : 'nullable|url';
        }

        // Valida apenas a propriedade atualizada
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $validatedData = $this->validate();

        if ($this->imagem instanceof UploadedFile) {
            $imagemPath = $this->imagem->store('imagens', 'public');
        } else {
            $imagemPath = $this->imagem;
        }

        Noticia::create([
            'titulo' => $validatedData['titulo'],
            'descricao' => $validatedData['descricao'],
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
