<?php

namespace App\Http\Livewire\Modals;

use Livewire\Component;

class TranslationModal extends Component
{

    public $translation;
    public $open = false;

    protected $listeners = [
        'openTranslationModal',
        'closeTranslationModal'
    ];


    public function openTranslationModal ($translation) {
        $this->open = true;
        $this->translation = json_decode($translation,true);
    }


    public function closeTranslationModal () {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.modals.translation-modal');
    }
}
