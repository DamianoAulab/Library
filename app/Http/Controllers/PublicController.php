<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Announcement;

class PublicController extends Controller
{
   

    public function homepage() {
        $categories = Category::all();
        $announcements = Announcement::take(4)->get()->sortByDesc('created_at');
        return view('homepage', compact('categories', 'announcements'));
    }

    public function search(Request $request) 
    {
        $announcement_search = Announcement::where('title', $request->search_announcement)->get();

        return view('announcements.index', ['announcements' => $announcement_search]);
    }

    //storage img profilo ??
    public function store(Request $request) {
        $path_image='';
        if($request->hasFile('img') && $request->file('img')->isValid()){
            $path_name=$request->file('img')->getClientOriginalName();
            $path_image=$request->file('img')->storeAs('public/images/profile',$path_name);
        }
        
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'gender'=>$request->gender,
            'phone'=>$request->phone,
            'img'=>$path_image,
            'birthday'=>$request->birthday,
        ]);

        return redirect()->route('homepage')->with('success', 'Sei un utente!');
    }
}
