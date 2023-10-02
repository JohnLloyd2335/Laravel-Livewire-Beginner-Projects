<?php

namespace App\Livewire;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class MultiImageUpload extends Component
{

    use WithFileUploads, WithPagination;
 
    public $images = [];


    public function render()
    {
        return view('livewire.multi-image-upload', [
            'galleries' => Gallery::orderBy('id','DESC')->paginate(6)
        ]);
    }
    public function uploadImages()
    {
        $this->validate([
            'images.*' => 'image|max:1024', // 1MB Max
        ]);


        foreach($this->images as $image)
        {
            $file_path = $image->store('images','public');
            Gallery::create(['image_path' => $file_path]);
        }
        
        $this->reset(['images']);
        $this->resetPage();
        $this->render(); 
        session()->flash('success', 'Images has been successfully Uploaded.');
    }
}
