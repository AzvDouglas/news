<?php

namespace App\Livewire;

use Livewire\Component;

class CreateNoticia extends Component
{
    public $showModal = false;

    public function showCreateModal()
    {
        $this->showModal = true;
    }

    // Outros métodos e lógica do componente...

    public function render()
    {
        return view('livewire.create-noticia');
    }

    public function salvarNoticia()
    {
        // Lógica para salvar a notícia
        // Após salvar, feche o modal
        $this->fecharModal();
    }
}
