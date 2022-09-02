@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Mostrar Solución
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $comment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Solicitud
                        </th>
                        <td>
                            {{ $comment->ticket->title ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Técnico/Ingeniero
                        </th>
                        <td>
                            {{ $comment->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Solución
                        </th>
                        <td>
                            {!! $comment->comment_text !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Salir
            </a>
        </div>


    </div>
</div>
@endsection
