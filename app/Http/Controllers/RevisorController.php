<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Redis;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->where('user_id', '!=', Auth::user()->id)->first();

        $categories = Category::orderBy('name_it', 'asc')->get();
        $announcements = Announcement::orderBy('created_at', 'desc')->where('is_accepted', true)->take(4)->get();

        if ($announcement_to_check == null) {
            return redirect()->route('homepage', compact('categories', 'announcements'))->with('success', 'Non ci sono annunci da revisionare! Torna più tardi!');
        }
        else {
            return view('revisor.index', compact('announcement_to_check'));
        }
    }

    public function acceptAnnouncement(Announcement $announcement)
    {
        Auth::user()->wallet += 0.05;
        Auth::user()->save();
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', 'Annuncio accettato!');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        Auth::user()->wallet += 0.05;
        Auth::user()->save();
        $announcement->setAccepted(false);
        return redirect()->back()->with('delete', 'Annuncio rifiutato!');
    }

    public function becomeRevisor(Request $request)
    {
        Auth::user()->description = $request->input('description');
        Auth::user()->save();
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('success', 'Hai chiesto di diventare revisore!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('success', 'L\'utente è diventato revisore!');
    }

    public function undoAnnouncement(Announcement $announcement_to_undo) {
        Auth::user()->wallet -= 0.05;
        Auth::user()->save();
        $announcement_to_undo = Announcement::orderBy('updated_at', 'desc')->where('is_accepted', '!=', null)->where('user_id', '!=', Auth::user()->id)->first();
        $announcement_to_undo->setAccepted(null);

        return redirect()->back()->with('edit', 'Annuncio ripristinato! Revisionalo nuovamente!');

    }
}
