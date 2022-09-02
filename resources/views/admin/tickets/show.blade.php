@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Mostrar Solicitud
    </div>

    <div class="card">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $ticket->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Creado
                        </th>
                        <td>
                            {{ $ticket->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Título
                        </th>
                        <td>
                            {{ $ticket->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Descripción
                        </th>
                        <td>
                            {!! $ticket->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Estado
                        </th>
                        <td>
                            {{ $ticket->status->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Prioridad
                        </th>
                        <td>
                            {{ $ticket->priority->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Categoría
                        </th>
                        <td>
                            {{ $ticket->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td>
                            {{ $ticket->author_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Correo Intitucional
                        </th>
                        <td>
                            {{ $ticket->author_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Teléfono
                        </th>
                        <td>
                            {{ $ticket->author_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Departamento
                        </th>
                        <td>
                        {{$ticket->department->name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Asignado a
                        </th>
                        <td>
                            {{ $ticket->assigned_to_user->name ?? '' }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <a class="btn btn-default my-2" href="{{ route('admin.tickets.index') }}">
            Salir
        </a>

        <a href="{{ route('admin.tickets.edit', $ticket->id) }}" class="btn btn-outline-primary">
            Editar
        </a>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
    </div>
</div>
@endsection
