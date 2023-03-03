<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Services\FetchBackEndInfo;
use Rap2hpoutre\FastExcel\FastExcel;

class DashboardMain extends Component
{

    public $group;
    public $keyword;
    public $translations;

    protected $queryString = [
        "keyword",
        "group"
    ];

    protected $listeners = ['filterByGroup','filterByKeyword','exportResults'];

    public function mount()
    {
        $this->getTranslationsByGroup();
    }

    private function getTranslationsByGroup(){
        try {
            $this->translations = FetchBackEndInfo::getTranslationByGroupAndLocale($this->group);

        } catch (\Throwable $th) {
            $this->translations = [];
        }
    }

    private function refreshResultTable(){
        $this->emit('refreshResultTable',json_encode([
            "translations" => $this->translations,
            "keyword" => $this->keyword
        ]));
    }

    public function filterByKeyword($keyword){
        $this->keyword = $keyword;
        $this->refreshResultTable();
    }

    public function filterByGroup($group){
        $this->group = $group;
        $this->getTranslationsByGroup();
        $this->refreshResultTable();
    }

    public function exportResults(){
        $data = [];
        foreach ($this->translations as $translation) {
            $data[] = [
                "NAME" => $translation['full_key'],
                "ENGLISH" => $translation['text']['en'],
                "ESPAÑOL" => $translation['text']['es'] ?? $translation['text']['en'],
                "DEUTSCH" => $translation['text']['de'] ?? $translation['text']['en'],
                "FRANÇAIS" => $translation['text']['fr'] ?? $translation['text']['en'],
                "ITALIANO" => $translation['text']['it'] ?? $translation['text']['en'],
                "DANSK" => $translation['text']['da'] ?? $translation['text']['en'],
            ];
        }

        $list = collect($data);
        $fileName = 'Translations-'.time().'.xlsx';

        (new FastExcel($list))->export('temp/'.$fileName);

        return response()->download(public_path('temp/'.$fileName));
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard-main');
    }
}
