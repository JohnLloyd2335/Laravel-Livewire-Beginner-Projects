<?php

namespace App\Livewire;

use Livewire\Component;

class Calculator extends Component
{
    public $num1 = 0;
    public $num2 = 0;
    public $action = '+';
    public $result = 0;


    public function render()
    {
        return view('livewire.calculator');
    }

    public function calculate()
    {
        $num1 = (float)$this->num1;
        $num2 = (float)$this->num2;

        switch($this->action){
            case '+' : $this->result = $num1 + $num2; break;  
            case '-' : $this->result = $num1 - $num2; break;  
            case '*' : $this->result = $num1 * $num2; break;  
            case '/' : $this->result = $num1 / $num2; break;  
            default : $this->result = 0;
        }
    }

   
    
}
