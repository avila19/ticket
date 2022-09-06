@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Crear Solicitud
        </div>

        <div class="card-body">
            <form action="{{ route('admin.tickets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Título</label>
                    <input type="text" id="title" name="title" class="text-uppercase form-control"
                        value="{{ old('title', isset($ticket) ? $ticket->title : '') }}" required>
                    @if ($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.ticket.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
                    <label for="content">Descripción</label>
                    <textarea id="content" name="content" class="form-control ">{{ old('content', isset($ticket) ? $ticket->content : '') }}</textarea>
                    @if ($errors->has('content'))
                        <em class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.ticket.fields.content_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('author_name') ? 'has-error' : '' }}">
                    <label for="author_name">Aquien asistir</label>
                    <input type="text" id="author_name" name="author_name" placeholder="Nombre Completo"
                        class="text-capitalize form-control"
                        value="{{ old('author_name', isset($ticket) ? $ticket->author_name : '') }}">
                    @if ($errors->has('author_name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('author_name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.ticket.fields.author_name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('status_id') ? 'has-error' : '' }}">
                    <label for="status">Estado*</label>
                    <select name="status_id" id="status" class="form-control select2 " required>
                        @foreach ($statuses as $id => $status)
                            <option value="{{ $id }}"
                                {{ (isset($ticket) && $ticket->status ? $ticket->status->id : old('status_id')) == $id ? 'selected' : '' }}>
                                {{ $status }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('status_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status_id') }}
                        </em>
                    @endif
                </div>

                <div class="form-group >
                <label for=" department"> Departamento a asistir* </label>
                    <select name="department_id" id="department" class="form-control select2">
                        <option value="">Elegir Dirección/Departamento</option>
                        @foreach ($departments as $id => $department)
                            <option value="{{ $id }}"
                                {{ (isset($ticket) && $ticket->department ? $ticket->department->id : old('$department_id')) == $id ? 'selected' : '' }}>
                                {{ $department }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group {{ $errors->has('priority_id') ? 'has-error' : '' }}">
                    <label for="priority">Prioridad*</label>
                    <select name="priority_id" id="priority" class="form-control select2" required>
                        @foreach ($priorities as $id => $priority)
                            <option value="{{ $id }}"
                                {{ (isset($ticket) && $ticket->priority ? $ticket->priority->id : old('priority_id')) == $id ? 'selected' : '' }}>
                                {{ $priority }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('priority_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('priority_id') }}
                        </em>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                    <label for="category">Categoría*</label>
                    <select name="category_id" id="category" class="form-control select2" required>
                        @foreach ($categories as $id => $category)
                            <option value="{{ $id }}"
                                {{ (isset($ticket) && $ticket->category ? $ticket->category->id : old('category_id')) == $id ? 'selected' : '' }}>
                                {{ $category }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('category_id') }}
                        </em>
                    @endif
                </div>


                @if (auth()->user()->isAdmin())
                    <div class="form-group {{ $errors->has('assigned_to_user_id') ? 'has-error' : '' }}">
                        <label for="assigned_to_user">Asignación a</label>
                        <select name="assigned_to_user_id" id="assigned_to_user" class="form-control select2">
                            @foreach ($assigned_to_users as $id => $assigned_to_user)
                                <option value="{{ $id }}"
                                    {{ (isset($ticket) && $ticket->assigned_to_user ? $ticket->assigned_to_user->id : old('assigned_to_user_id')) == $id ? 'selected' : '' }}>
                                    {{ $assigned_to_user }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('assigned_to_user_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('assigned_to_user_id') }}
                            </em>
                        @endif
                    </div>
                @endif
                <div>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>
            </form>

        </div>
    </div>
@endsection
