<?php

namespace App\Livewire;

use App\Models\Continent;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CascadingDropdown extends Component
{

    public Collection $continents;
    public $countries = [];
    public $selectedContinent;

    public function mount()
    {
        $this->continents = Continent::all();
    }

    public function render()
    {
        return view('livewire.cascading-dropdown');
    }

    public function fetchCountries()
    {
        if($this->selectedContinent !== -1){
            $this->countries = Country::where('continent_id',$this->selectedContinent)->pluck('name','id')->toArray();
        }
       
    }
}
