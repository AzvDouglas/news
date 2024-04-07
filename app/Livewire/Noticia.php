<?php

namespace App\Livewire;

use Livewire\Component;

class Noticia extends Component
{
    public $titulo;
    public $descricao;
    public $imagem;

    public function mount($titulo, $descricao, $imagem)
    {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->imagem = $imagem;
    }
    public function render()
    {
        return view('livewire.noticia');
    }
}
