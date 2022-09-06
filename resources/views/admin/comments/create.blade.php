@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Agregar Solución
        </div>

        <div class="card-body">
            <form action="{{ route('admin.comments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('ticket_id') ? 'has-error' : '' }}">
                    <label for="ticket">Solicitud</label>
                    <select name="ticket_id" id="ticket" class="form-control select2">
                        <option value=" ">Please select</option>
                        @foreach ($tickets as $ticket)
                            <option value="{{ $ticket['id'] }}">{{ $ticket['title'] }}, {{ $ticket['created_at'] }},
                                {{ $ticket['author_name'] }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('ticket_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('ticket_id') }}
                        </em>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
                    <label for="user">Técnico/Ingeniero</label>
                    <select name="user_id" id="user" class="form-control select2">
                        @foreach ($users as $id => $user)
                            <option value="{{ $id }}"
                                {{ (isset($comment) && $comment->user ? $comment->user->id : old('user_id')) == $id ? 'selected' : '' }}>
                                {{ $user }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('user_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('user_id') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('comment_text') ? 'has-error' : '' }} ">
                    <label for="comment_text">Solución*</label>
                    <textarea id="comment_text" name="comment_text" class="form-control" required>{{ old('comment_text', isset($comment) ? $comment->comment_text : '') }}</textarea>
                    @if ($errors->has('comment_text'))
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
