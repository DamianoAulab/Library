<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;


use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AnnouncementEdit extends Component
{   
    use WithFileUploads;
    public $title, $price, $description, $category_id, $images=[], $temporary_images;
    public $imagesFromDb;
    public Announcement $announcement;

    protected $rules = [
        'announcement.title' => 'required|max:100',
        'announcement.price' => 'required|numeric',
        'announcement.description' => 'required',
        'images.*' => 'image|max:3072',
        'temporary_images.*' => 'image|max:3072',
    ];

    public function mount() {
        $this->imagesFromDb = $this->announcement->images()->get();
    }

    public function update() {
        if (count($this->images)) {
            
            foreach ($this->images as $image) {
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path' => $image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path, 600, 600));
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->announcement->save();
        $this->announcement->setAccepted(null);

        session()->flash('edit', 'Annuncio modificato! Sarà pubblicato dopo la revisione!');
        return redirect()->route('users.show', ['user' => Auth::user()->id]);
    }

    public function updatedTemporaryImages() {
        
        if ($this->validate([
            'temporary_images.*' => 'image|max:3072',
        ])) {
        foreach ($this->temporary_images as $image) {
            $this->images[] = $image;
        }
      }
    }



    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function removeImage($key) {
        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
            
        }
    }

    public function removeImageFromDb($key) {
        if ($this->imagesFromDb->hasAny($key)) {
            $this->imagesFromDb->get($key)->delete();
            $this->imagesFromDb->forget($key);
            
        }
    }
    
    public function render()
    {
        return view('livewire.announcement-edit');
    }
}
