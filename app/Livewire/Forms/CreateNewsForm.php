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

    protected $rules = [
        'titulo' => 'required|min:3',
        'descricao' => 'required|min:10',
    ];

    protected $messages = [
        'titulo.required' => 'O campo título é obrigatório.',
        'titulo.min' => 'O campo título deve ter no mínimo :min caracteres.',
        'descricao.required' => 'O campo descrição é obrigatório.',
        'descricao.min' => 'O campo descrição deve ter no mínimo :min caracteres.',
        'imagem' => 'Faça o upload de um arquivo de imagem válido por favor.'
    ];



    public function updated($propertyName)
    {
        if ($propertyName === 'imagem') {
            $this->rules['imagem'] = $this->imagem instanceof UploadedFile
                ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'sometimes|url';
        }
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
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
            //limpar o formulário
            $this->titulo = '';
            $this->descricao = '';

            session()->flash('success', 'Notícia criada com sucesso.');
    
            return $this->redirect('/dashboard');
        } catch (\Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao criar a notícia. Por favor, tente novamente.' . PHP_EOL . $e);
        }
    }
    
    

    public function render()
    {
        return view('livewire.forms.create-news-form');
    }
}
