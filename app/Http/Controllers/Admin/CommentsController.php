<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Ticket;
use App\User;
use App\Imports\CommentsImport;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class CommentsController extends Controller
{

    public function create()
    {

        $tickets = Ticket::where('status_id',2)->orderBy('id','DESC')->get();

        $users = User::whereHas('roles', function($query) {
            $query->whereId(2);
        })->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.comments.create', compact('tickets', 'users'));
    }

    public function store(StoreCommentRequest $request)
    {
        $ticketid = $request-> ticket_id;

        if(Comment::where('ticket_id','=', $ticketid)->exists()){
            return redirect()->back()->withErrors('Esta solicitud ya tiene solucion');
        }else{
            $comment = Comment::create($request->all());
            return redirect()->route('admin.home');
        }

    }

    public function edit(Comment $comment)
    {

        $tickets = Ticket::where('status_id',2)->orderBy('id','DESC')->get();

        $users = User::whereHas('roles', function($query) {
            $query->whereId(2);
        })->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $comment->load('ticket', 'user');

        return view('admin.comments.edit', compact('tickets', 'users', 'comment'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        return redirect()->route('admin.home');
    }

    public function show(Comment $comment)
    {

        $comment->load('ticket', 'user');

        return view('admin.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {

        $comment->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommentRequest $request)
    {
        Comment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function importSoluciones(Request  $request)
    {
        if( $file = $request->file('file')){
            Excel::import(new CommentsImport, $file);
            return back()->withStatus('Importacion de SOLUCIONES exitosa');
        }else{
            return redirect()->back()->withErrors('No ha cargado el archivo excel');
        }

    }
}
