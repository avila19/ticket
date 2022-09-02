@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Editar Solución
    </div>

    <div class="card-body">
        <form action="{{ route("admin.comments.update", [$comment->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
                <label for="ticket">Solicitud</label>
                <select name="ticket_id" id="ticket" class="form-control select2">
                    @foreach($tickets as $ticket)
                        <option value="{{$ticket['id']}}" >{{$ticket['title']}}, {{$ticket['created_at']}}, {{$ticket['author_name']}}</option>
                    @endforeach
                </select>
                @if($errors->has('ticket_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ticket_id') }}
                    </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                <label for="user">Técnico/Ingeniero</label>
                <select name="assigned_to_user_id" id="assigned_to_user" class="form-control select2">
                    @foreach($assigned_to_users as $id => $assigned_to_user)
                        <option value="{{ $id }}" {{ (isset($ticket) && $ticket->assigned_to_user ? $ticket->assigned_to_user->id : old('assigned_to_user_id')) == $id ? 'selected' : '' }}>{{ $assigned_to_user }}</option>
                    @endforeach
                </select>
                @if($errors->has('assigned_to_user_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('assigned_to_user_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('comment_text') ? 'has-error' : '' }}">
                <label for="comment_text">Solución*</label>
                <textarea id="comment_text" name="comment_text" class="form-control " required>{{ old('comment_text', isset($comment) ? $comment->comment_text : '') }}</textarea>
                @if($errors->has('comment_text'))
                    <em class="invalid-feedback">
                        {{ $errors->first('comment_text') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.comment.fields.comment_text_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </form>

    </div>
</div>
@endsection
