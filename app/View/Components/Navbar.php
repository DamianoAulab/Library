<?php

namespace App\View\Components;

use App\Models\Announcement;
use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navbar extends Component
{
    public $categories;
    public $announcements_to_check;

    public function __construct()
    {
        $this->categories = Category::orderBy('name', 'asc')->get();
        $this->announcements_to_check = Announcement::where('is_accepted', null)->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
