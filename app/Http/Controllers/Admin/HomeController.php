<?php

namespace App\Http\Controllers\Admin;

use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Ticket;
use App\Comment;
class HomeController
{
    public function index( )
    {

    $totalTickets = Ticket::count();
    $openTickets = Ticket::whereHas('status', function($query) {
    $query->whereName('Abierto');
    })->count();
    $closedTickets = Ticket::whereHas('status', function($query) {
    $query->whereName('Cerrado');
    })->count();

    if(auth()->user()){
        $comments = Comment::all();
    }else{
        $comments = Comment::where('user_id',auth()->id() )->get();
    }


    return view('home', compact('totalTickets', 'openTickets', 'closedTickets','comments'));
    }
}
