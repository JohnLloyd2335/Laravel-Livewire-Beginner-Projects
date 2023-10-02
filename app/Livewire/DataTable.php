<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class DataTable extends Component
{
    use WithPagination;

    #[Url(as : 's')]
    public $search;

    public $perPage = 10;
    public $orderBy = 'ASC'; 

    public $min;
    public $max;

    public $start_date;
    public $end_date;

    public function render()
    {

        $productsQuery = Product::query();

        if(!empty($this->search))
        {
            $productsQuery->where('name','like','%'.$this->search.'%')
                    ->orWhere('description','like','%'.$this->search.'%');
        }

        if(!empty($this->min) && !empty($this->max))
        {
            $productsQuery->whereBetween('price',[$this->min,$this->max]);
        }

        if(!empty($this->start_date) && !empty($this->end_date))
        {
            $productsQuery->whereBetween('created_at',[$this->start_date,$this->end_date]);
        }

        $products = $productsQuery->orderBy('id',$this->orderBy)->paginate($this->perPage);
        //dd($products);
        return view('livewire.data-table', [
            'products' => $products
        ]);
    }

    public function updatePerPage()
    {
        $this->resetPage();
        $this->perPage = $this->perPage;
    }

    public function updateOrderBy()
    {
        $this->resetPage();
        $this->orderBy = $this->orderBy;
    }
}
