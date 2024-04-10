<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalExemplo extends Component
{
    public $modalAberto = false;
    protected $layout = 'components.layouts.app';

    public function abrirModal()
    {
        $this->modalAberto = true;
    }

    public function fecharModal()
    {
        $this->modalAberto = false;
    }

    public function render()
    {
        return view('livewire.modal-exemplo');
    }
}
