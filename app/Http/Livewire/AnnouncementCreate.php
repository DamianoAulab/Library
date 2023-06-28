<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
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
        $this->validate();

        Announcement::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'img' => $this->img,
            'category_id' => $this->category_id,
            'user_id' => Auth::user()->id,
        ]);

        //vedere messaggio success 
        $this->reset('title', 'description', 'price', 'img', 'category_id');
        session()->flash('announcement', 'Annuncio creato!');
        return redirect(route('homepage'));
    }

    public function render()
    {
        return view('livewire.announcement-create');
    }
}
