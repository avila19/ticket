@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Ticket #{{ $ticket->id }}</div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    Titulo
                                </th>
                                <td>
                                    {{ $ticket->title }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Contenido
                                </th>
                                <td>
                                    {!! $ticket->content !!}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Estados
                                </th>
                                <td>
                                    {{ $ticket->status->name ?? '' }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Autor Ticket
                                </th>
                                <td>
                                    {{ $ticket->author_name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Correo Institucional
                                </th>
                                <td>
                                    {{ $ticket->author_email }}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
