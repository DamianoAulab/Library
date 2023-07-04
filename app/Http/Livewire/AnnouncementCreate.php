<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AnnouncementCreate extends Component
{
    use WithFileUploads;
    
    public $title, $price, $description, $img, $category_id;
    

    
    protected $rules = [
        'title' => 'required|max:100|min:5',
        'price' => 'required|numeric',
        'description' => 'required',
        'img' => 'image|max:1024|nullable',
    ];

    protected $messages = [
        'required' => 'Il campo :attribute è richiesto',
        'max' => 'Il campo :attribute è troppo lungo',
        'min' => 'Il campo :attribute è troppo corto',
        

    ];

    

    public function store(){

        $this->validate();

        $category = Category::find($this->category_id);

         $category->announcements()->create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'img' => $this->img,
            'user_id' => Auth::user()->id,
        ]);


        $this->reset('title', 'description', 'price', 'img', 'category_id');
        session()->flash('success', 'Annuncio creato! Sarà pubblicato dopo la revisione');
        return redirect()->route('announcements.create');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.announcement-create');
    }
}
