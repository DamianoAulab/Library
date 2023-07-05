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
use App\Models\Category;

class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();

        $categories = Category::orderBy('name', 'asc')->get();
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
        $announcement->setAccepted(true);
        return redirect()->back()->with('success', 'Annuncio accettato!');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        return redirect()->back()->with('delete', 'Annuncio rifiutato!');
    }

    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('success', 'Hai chiesto di diventare revisore!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        return redirect('/')->with('success', 'L\'utente è diventato revisore!');
    }
}
