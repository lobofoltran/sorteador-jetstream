<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalSorteio extends Component
{
    public $showModalSorteio = true;

    public function render()
    {
        return view('livewire.modal-sorteio');
    }
}
