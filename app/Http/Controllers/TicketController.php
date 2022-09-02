<?php

namespace App\Http\Controllers;

use App\Department;
use App\Ticket;
use App\Http\Controllers\Traits\MediaUploadingTrait;
//use App\Notifications\CommentEmailNotification;
//use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    use MediaUploadingTrait;

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all()->pluck('name','id');
        return view('tickets.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'author_name'   => 'required',
            'author_email'  => 'required|email',
            'author_phone'  => 'required',
            'department_id' => 'required',
        ]);

        $request->request->add([
            'category_id'   => 1,
            'status_id'     => 1,
            'priority_id'   => 1
        ]);

        $ticket = Ticket::create($request->all());

        return redirect()->back()->withStatus(' Su ticket ha sido ENVIADO, nos pondremos en contacto.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */

}
