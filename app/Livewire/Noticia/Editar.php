<?php

namespace App\Livewire\Noticia;

use Livewire\Component;
use App\Models\Noticia;

class Editar extends Component
{
    public $noticia;

    public function mount($noticiaId)
    {
        $this->noticia = Noticia::find($noticiaId);
    }

    public function atualizarNoticia()
    {
        $this->noticia->save();

        session()->flash('mensagem', 'Notícia atualizada com sucesso!');
    }

    public function render()
    {
        return view('livewire.editar-noticia');
    }
}
