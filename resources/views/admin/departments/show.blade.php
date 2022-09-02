@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Mostrar Dirección/Departamento
        </div>
        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th class="font-weight-normal">
                            {{$department->id}}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th class="font-weight-normal">
                            {{$department->name}}
                        </th>
                    </tr>
                    <tr>
                        <th>
                            Descripción
                        </th>
                        <th class="font-weight-normal">
                            {{$department->description}}
                        </th>
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
