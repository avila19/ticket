@extends('layouts.admin')
@section('content')
@can('priority_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.priorities.create") }}">
                Agregar Prioridad
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Lista Prioridades
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Priority">
                <thead>
                    <tr>
                        <th width="1">
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Color
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($priorities as $key => $priority)
                        <tr data-entry-id="{{ $priority->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $priority->name ?? '' }}
                            </td>
                            <td style="background-color:{{ $priority->color ?? '#FFFFFF' }}"></td>
                            <td>
                                @can('priority_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.priorities.show', $priority->id) }}">
                                        Mostrar
                                    </a>
                                @endcan

                                @can('priority_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.priorities.edit', $priority->id) }}">
                                        Editar
                                    </a>
                                @endcan

                                @can('priority_delete')
                                    <form action="{{ route('admin.priorities.destroy', $priority->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
