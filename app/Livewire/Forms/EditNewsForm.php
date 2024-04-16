<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Noticia;

class EditNewsForm extends Component
{
    use WithFileUploads;

    public Noticia $noticia;
    public $imagem;
    public $titulo;
    public $descricao;
    public $noticiaId;

    protected $listeners = ['editNews'];

    public function mount($noticiaId)
    {
        $this->noticia = Noticia::findOrFail($noticiaId);
        $this->noticiaId = $noticiaId;
    }
}
