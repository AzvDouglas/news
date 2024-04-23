<?php

namespace App\Livewire\Noticia;

use Livewire\Component;
use App\Models\Noticia;

class Edit extends Component
{
    public Noticia $noticia;
    

    public function render()
    {
        return view('livewire.noticia.edit');
    }

    public function mount(Noticia $noticia)
    {
        $this->noticia = $noticia;

    }
}
