<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class KeywordFilter extends Component
{
    public $keyword = '';

    protected $queryString = [
        "keyword" => [
            "except" => ''
        ]
    ];

    public function updatedKeyword($value)
    {
        $this->emit('filterByKeyword', $value);
    }

    public function render()
    {
        return view('livewire.dashboard.keyword-filter');
    }
}
