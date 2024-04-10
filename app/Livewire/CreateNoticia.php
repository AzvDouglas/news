<?php

namespace App\Livewire;

use Livewire\Component;

class CreateNoticia extends Component
{
    public $showModal = false;

    public function render()
    {
        return view('livewire.create-noticia');
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function salvarNoticia()
    {
        // Lógica para salvar a notícia
        // Após salvar, feche o modal
        $this->fecharModal();
    }
}
