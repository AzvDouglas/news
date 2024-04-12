<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Noticia;

class CreateNewsForm extends Component
{
    public $titulo;
    public $descricao;
    public $imagem;

    protected $rules = [
        'titulo' => 'required',
        'descricao' => 'required',
        'imagem' => 'image|max:1024', // Exemplo de regra de validação para imagem
    ];

    protected $feedback = [
        'titulo.required' => 'O título é obrigatório',
        'descricao.required' => 'A descrição é obrigatória',
        'imagem.image' => 'A imagem deve ser uma imagem',
        'imagem.max' => 'A imagem deve ter no máximo 1024x1024 pixels',
    ];
    

    public function save()
    {
        $this->validate();
        dd($this->titulo, $this->descricao, $this->imagem);

        // Salvar a notícia no banco de dados
        Noticia::create([
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
            'imagem' => $this->imagem->store('imagens', 'public'),
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('message', 'Notícia criada com sucesso.');

        return $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.create-news-form');
    }
}
