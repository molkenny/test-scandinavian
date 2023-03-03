<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Services\FetchBackEndInfo;

class GroupFilter extends Component
{

    public $groups = [];
    public $selectedGroup = '';

    protected $queryString = [
        "selectedGroup" => [
            "as" => "group",
            "except" => ''
        ]
    ];


    public function mount()
    {
        $this->getGroups();
    }

    private function getGroups(){
        try {
            $this->groups = FetchBackEndInfo::getTranslationGroups();
        } catch (\Throwable $th) {
            $this->groups = [];
        }

    }

    public function setGroup($group){
        $this->selectedGroup = $group;
        $this->emit('filterByGroup', $group);
    }

    public function render()
    {
        return view('livewire.dashboard.group-filter');
    }
}
