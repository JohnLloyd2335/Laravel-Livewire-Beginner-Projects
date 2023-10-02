<?php

namespace App\Livewire;

use App\Models\Todo as ModelsTodo;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Todo extends Component
{
    public Collection $todos;

    #[Rule('required|string|max:255')]
    public $title;

    public function mount()
    {
        $this->todos = ModelsTodo::all();
    }

    public function render()
    {
        return view('livewire.todo');
    }
    

    public function addTodo()
    {
        $this->validate();

        ModelsTodo::create([
            'title' => $this->title,
            'is_completed' => false
        ]);

        $this->todos = ModelsTodo::all();

        $this->reset('title');
    }

    public function deleteTodo(ModelsTodo $todo)
    {
        $todo->delete();

        $this->todos = ModelsTodo::all();
    }

    public function toggleCompleted(ModelsTodo $todo)
    {
        $todo->is_completed = !$todo->is_completed;
        $todo->save();
        $this->todos = ModelsTodo::all();
    }
}
