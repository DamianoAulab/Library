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
        'title' => 'required|max:100',
        'price' => 'required|numeric',
        'description' => 'required',
        'img' => 'image|max:1024',
    ];

    public function store(){

        $category = Category::find($this->category_id);

         $category->announcements()->create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'img' => $this->img,
            'user_id' => Auth::user()->id,
        ]);


        //vedere messaggio success 
        $this->reset('title', 'description', 'price', 'img', 'category_id');
        session()->flash('announcement', 'Annuncio creato!');
        return redirect(route('announcements.show', ['announcement'=>$this->id]));
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.announcement-create');
    }
}
