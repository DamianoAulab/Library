<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AnnouncementEdit extends Component
{   

    public $title, $price, $description, $img, $category_id;
    

    
    protected $rules = [
        'title' => 'required|max:100',
        'price' => 'required|numeric',
        'description' => 'required',
        'img' => 'image|max:1024',
    ];

    public function update() {
        
        $category = Category::find($this->category_id);

        $announcement = $category->announcements()->update([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'img' => $this->img,
            'user_id' => Auth::user()->id,
        ]);

        $this->reset('title', 'description', 'price', 'img', 'category_id');
        session()->flash('success', 'Annuncio modificato!');
        return redirect()->route('announcements.show', ['announcement'=>$announcement->id]);
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.announcement-edit');
    }
}
