<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AnnouncementEdit extends Component
{   

    public $title, $price, $description, $img, $category_id;

    public Announcement $announcement;

    protected $rules = [
        'announcement.title' => 'required|max:100',
        'announcement.price' => 'required|numeric',
        'announcement.description' => 'required',
        'announcement.img' => 'image|max:1024',
    ];

    public function update() {
        
        $this->announcement->save();

        session()->flash('edit', 'Annuncio modificato!');
        return redirect()->route('announcements.show', ['announcement' => $this->announcement->id]);
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }
    
    public function render()
    {
        return view('livewire.announcement-edit');
    }
}
