@extends('layouts.admin')
@section('content')
    @can('department_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.departments.create") }}">
                    Agregar Dirección/Departamento
                </a>
            </div>
        </div>

    @endcan
    <div class="card">
        <div class="card-header">
            Dirección/Departamento
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                    <tr>
                        <th width="1">

                        </th>
                        <th>
                            Dirección/Departamento
                        </th>
                        <th>
                            Descripción
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $key=>$department)
                        <tr data-entry-id ="{{$department->id}}">
                            <td>
                            </td>
                            <td>
                                {{$department->name ?? ''}}
                            </td>
                            <td>
                                {{$department->description ?? ''}}
                            </td>

                            <td>
                                @can('department_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.departments.show', $department->id) }}">
                                        Mostrar
                                    </a>
                                @endcan

                                @can('department_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.departments.edit', $department->id) }}">
                                        Editar
                                    </a>
                                @endcan

                                @can('department_delete')
                                    <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST"
                                          onsubmit="return confirm('Esta seguro');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Borrar">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


