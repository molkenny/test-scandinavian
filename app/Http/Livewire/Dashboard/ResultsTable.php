<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class ResultsTable extends Component
{

    public $translations;
    public $keyword;
    public $count = 0;

    protected $listeners = ['refreshResultTable'];

    public function mount(){
        $this->filterByKeyword();
    }

    public function refreshResultTable($payload){
        $payload = json_decode($payload);
        $this->translations = $payload->translations;
        $this->keyword = $payload->keyword;
        $this->filterByKeyword();
    }

    private function filterByKeyword(){
        $newTranslations = [];
        foreach ($this->translations as $translation) {
            if(str_contains($translation->full_key, $this->keyword)) $newTranslations[] = $translation;
            elseif (str_contains($translation->text->en ?? '', $this->keyword)) $newTranslations[] = $translation;
            elseif (str_contains($translation->text->es ?? '', $this->keyword)) $newTranslations[] = $translation;
            elseif (str_contains($translation->text->de ?? '', $this->keyword)) $newTranslations[] = $translation;
            elseif (str_contains($translation->text->fr ?? '', $this->keyword)) $newTranslations[] = $translation;
            elseif (str_contains($translation->text->it ?? '', $this->keyword)) $newTranslations[] = $translation;
            elseif (str_contains($translation->text->da ?? '', $this->keyword)) $newTranslations[] = $translation;
        }
        $this->translations = $newTranslations;
    }

    public function checkForKeyword($string){
        $auxString = strval($string);
        $startPosition = strpos($auxString, $this->keyword);
        $keywordLength = strlen($this->keyword);
        $html = '<span>';

        if($keywordLength){
            for($i=0 ; $i < strlen($auxString) ; $i++ ){
                if($i < $startPosition || $i > $startPosition + $keywordLength) $html .= $auxString[$i];
                else{
                    if($i === $startPosition) $html .= '<span style="background: #FFEE54;">'.$auxString[$i];
                    else if($i === $startPosition + $keywordLength -1) $html .= $auxString[$i].'</span>';
                    else $html .= $auxString[$i];
                }
            }
        }else{
            $html .= $string;
        }

        $html .= '</span>';
        return $html;
    }

    public function render()
    {
        return view('livewire.dashboard.results-table');
    }
}
