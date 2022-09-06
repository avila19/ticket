@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card "
                    style="background-image: url(https://st3.depositphotos.com/1748392/18584/v/1600/depositphotos_185844448-stock-illustration-technical-support-repair-assistance-seamless.jpg);background-size:auto ;background-repeat: no-repeat">
                    <div class="card-body ">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-xl-4 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="d-flex flex-row">
                                                <div class="align-self-center">
                                                    <i class="fas fa-hashtag text-success fa-3x me-4"></i>
                                                </div>
                                                <div class="px-2">
                                                    <h4>Total Solicitudes</h4>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="h1 mb-0">{{ number_format($totalTickets) }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="d-flex flex-row">
                                                <div class="align-self-center">
                                                    <i class="fas fa-ticket-alt text-danger fa-3x me-4"></i>
                                                </div>
                                                <div class="px-2">
                                                    <h4>Solicitudes Abiertas</h4>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="h1 mb-0">{{ number_format($openTickets) }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between p-md-1">
                                            <div class="d-flex flex-row">
                                                <div class="align-self-center">
                                                    <i class="fas fa-ticket-alt text-primary fa-3x me-4"></i>
                                                </div>
                                                <div class="px-2">
                                                    <h4>Solicitudes Cerradas</h4>
                                                </div>
                                            </div>
                                            <div class="align-self-center">
                                                <h2 class="h1 mb-0">{{ number_format($closedTickets) }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @can('comment_create')
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-6">
                            <a class="btn btn-success" href="{{ route('admin.comments.create') }}">
                                Agregar Solución
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <form action="{{ route('admin.comments.importSoluciones') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file">
                                <button type="submit" class="btn btn-danger">Importar Soluciones</button>
                            </form>
                        </div>
                    </div>
                @endcan
                <div class="card">
                    <div class="card-header">
                        Soluciones
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive m-auto">
                            <table
                                class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Comment dataTable_width_auto">
                                <thead>
                                    <tr>
                                        <th width="1">
                                        </th>
                                        <th>
                                            ID_Solicitud
                                        </th>
                                        <th>
                                            Solicitud
                                        </th>
                                        <th>
                                            Autor_Solicitud
                                        </th>
                                        <th>
                                            Direcc/Depart
                                        </th>
                                        <th>
                                            Fecha_Solución
                                        </th>
                                        <th>
                                            Técnico/Ingeniero
                                        </th>
                                        <th>
                                            Solución
                                        </th>
                                        <th>
                                            &nbsp;
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $key => $comment)
                                        <tr data-entry-id="{{ $comment->id }}">
                                            <td>
                                            </td>
                                            <td>
                                                {{ $comment->ticket->id ?? '' }}
                                            </td>
                                            <td>
                                                {{ $comment->ticket->title ?? '' }}
                                            </td>
                                            <td>
                                                {{ $comment->ticket->author_name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $comment->ticket->department->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $comment->created_at ?? '' }}
                                            </td>
                                            <td>
                                                {{ $comment->user->name ?? '' }}
                                            </td>
                                            <td>
                                                {{ $comment->comment_text ?? '' }}
                                            </td>
                                            <td>
                                                @can('comment_show')
                                                    <a class="btn btn-xs btn-primary"
                                                        href="{{ route('admin.comments.show', $comment->id) }}">
                                                        Mostrar
                                                    </a>
                                                @endcan

                                                @can('comment_edit')
                                                    <a class="btn btn-xs btn-info"
                                                        href="{{ route('admin.comments.edit', $comment->id) }}">
                                                        Editar
                                                    </a>
                                                @endcan

                                                @can('comment_delete')
                                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                        style="display: inline-block;">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <input type="submit" class="btn btn-xs btn-danger" value="Eliminar">
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
            @section('scripts')
                @parent
                <script>
                    $(function() {
                        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                        @can('comment_delete')
                            let deleteButtonTrans = 'Eliminar'
                            let deleteButton = {
                                text: deleteButtonTrans,
                                url: "{{ route('admin.comments.massDestroy') }}",
                                className: 'btn btn-outline-danger',
                                action: function(e, dt, node, config) {
                                    var ids = $.map(dt.rows({
                                        selected: true
                                    }).nodes(), function(entry) {
                                        return $(entry).data('entry-id')
                                    });

                                    if (ids.length === 0) {
                                        alert('No hay seleccionados')
                                        return
                                    }

                                    if (confirm('Esta seguro')) {
                                        $.ajax({
                                                headers: {
                                                    'x-csrf-token': _token
                                                },
                                                method: 'POST',
                                                url: config.url,
                                                data: {
                                                    ids: ids,
                                                    _method: 'DELETE'
                                                }
                                            })
                                            .done(function() {
                                                location.reload()
                                            })
                                    }
                                }
                            }
                            dtButtons.push(deleteButton)
                        @endcan

                        $.extend(true, $.fn.dataTable.defaults, {
                            order: [
                                [4, 'DESC']
                            ],
                            pageLength: 20,
                        });
                        $('.datatable-Comment:not(.ajaxTable)').DataTable({
                            buttons: dtButtons
                        })

                        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                            $($.fn.dataTable.tables(true)).DataTable()
                                .columns.adjust();

                        });

                    })
                </script>
            @endsection
