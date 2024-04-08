<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Noticia as NoticiaModel;

class Noticia extends Component
{
    public $noticia;

    public function mount(NoticiaModel $noticia)
    {
        $this->noticia = $noticia;
    }

    public function render()
    {
        return view('livewire.noticia');
    }
}
