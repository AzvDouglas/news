<?php

namespace App\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use App\Models\Noticia;
class EditNewsForm extends Component
{
    use WithFileUploads;

    protected $listeners = ['editNoticia' => 'edit'];

    public Noticia $noticia;

    public $noticiaId;

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

    public function mount(Noticia $noticiaEditada)
    {
        //dd($noticiaEditada);
        $this->titulo = $noticiaEditada->titulo;
        $this->descricao = $noticiaEditada->descricao;
        $this->imagem = $noticiaEditada->imagem;
    }
    
    
    public function edit($noticiaId)
    {
        dd($noticiaEditada);
        $noticiaEditada = Noticia::find($noticiaId);
        $this->mount($noticiaEditada);
    }
    
    public function updated($propertyName)
    {
        if ($propertyName === 'imagem') {
            $this->rules['imagem'] = $this->imagem instanceof UploadedFile
                ? 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                : 'sometimes|url';
        }
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.forms.edit-news-form');
    }
}
