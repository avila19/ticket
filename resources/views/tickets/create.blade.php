@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {!! session('status') !!}
                    </div>
                @endif
                <div class="card border-primary mb-3">
                    <div class="card-header font-weight-bold">Nueva Solicitud</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="author_name" class="col-md-4 col-form-label text-md-right ">Nombre
                                    Completo</label>

                                <div class="col-md-6">
                                    <input id="author_name" type="text" placeholder="nombre completo"
                                        class="text-capitalize form-control @error('author_name') is-invalid @enderror"
                                        name="author_name" value="{{ old('author_name') }}" required autocomplete="name"
                                        autofocus>

                                    @error('author_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author_email" class="col-md-4 col-form-label text-md-right">Correo
                                    Intitucional</label>

                                <div class="col-md-6">
                                    <input id="author_email" type="email" placeholder="usuario@sag.gob.hn"
                                        class="form-control @error('author_email') is-invalid @enderror" name="author_email"
                                        value="{{ old('author_email') }}" required autocomplete="email">

                                    @error('author_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="author_name" class="col-md-4 col-form-label text-md-right ">Teléfono</label>
                                <div class="col-md-6">
                                    <input id="author_phone" type="text" placeholder="####-####"
                                        pattern="[0-9]{4}[-][0-9]{4}"
                                        class="form-control @error('author_phone') is-invalid @enderror" name="author_phone"
                                        value="{{ old('author_phone') }}" required autocomplete="phone" autofocus>

                                    @error('author_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Departamento</label>
                                <div class="col-md-6">
                                    <select name="department_id" id="department" class="form-control select2">
                                        <option value="">Elegir Dirección/Departamento</option>
                                        @foreach ($departments as $id => $department)
                                            <option value="{{ $id }}"
                                                {{ (isset($ticket) && $ticket->department ? $ticket->department->id : old('$department_id')) == $id ? 'selected' : '' }}>
                                                {{ $department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Título</label>
                                <div class="col-md-6">
                                    <input id="title" type="text"
                                        class="text-uppercase form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" required autocomplete="title">

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="content" class="col-md-4 col-form-label text-md-right">Descripción</label>

                                <div class="col-md-6">
                                    <textarea class="text-tolower form-control @error('content') is-invalid @enderror" id="content" name="content"
                                        rows="3" required>{{ old('content') }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@stop
