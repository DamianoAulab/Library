<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class PublicController extends Controller
{
   

    public function homepage() {
        $categories = Category::all();
        return view('welcome', compact('categories'));
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
