@extends('layouts.admin')
@section('content')
@can('status_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.statuses.create") }}">
                Agregar Estado
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Lista Estados
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Status">
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
                    @foreach($statuses as $key => $status)
                        <tr data-entry-id="{{ $status->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $status->name ?? '' }}
                            </td>
                            <td style="background-color:{{ $status->color ?? '#FFFFFF' }}"></td>
                            <td>
                                @can('status_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.statuses.show', $status->id) }}">
                                        Mostrar
                                    </a>
                                @endcan

                                @can('status_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.statuses.edit', $status->id) }}">
                                        Editar
                                    </a>
                                @endcan

                                @can('status_delete')
                                    <form action="{{ route('admin.statuses.destroy', $status->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
