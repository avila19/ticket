@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Mostrar Prioridad
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
                            {{ $priority->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <td>
                            {{ $priority->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Color
                        </th>
                        <td style="background-color:{{ $priority->color ?? '#FFFFFF' }}"></td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Salir
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection