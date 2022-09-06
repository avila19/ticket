@extends('layouts.admin')
@section('content')
    @can('ticket_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-6">
                <a class="btn btn-success" href="{{ route("admin.tickets.create") }}">
                    Crear Solicitud
                </a>
            </div>
            <div class="col-lg-6">
                <form action="{{ route('admin.tickets.importSolicitudes') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file">
                    <button type="submit" class="btn btn-danger">Importar Solicitudes</button>
                </form>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Solicitudes
        </div>
        <div class=" card-body ">
            <div class="table-responsive m-auto ">
                <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Ticket dataTable_width_auto">
                    <thead>
                    <tr>
                        <th width="1">
                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Título
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            Prioridad
                        </th>
                        <th>
                            Categoría
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Creado
                        </th>
                        <th>
                            Departamento
                        </th>
                        <th>
                            Asignado
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let filters = `
<form class="form-inline" id="filtersForm">
  <div class="form-group mx-sm-2 mb-2">
    <select class="form-control" name="status">
      <option value="">Estados</option>
      @foreach($statuses as $status)
            <option value="{{ $status->id }}"{{ request('status') == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
      @endforeach
            </select>
          </div>
          <div class="form-group mx-sm-2 mb-2">
            <select class="form-control" name="priority">
              <option value="">Prioriades</option>
      @foreach($priorities as $priority)
            <option value="{{ $priority->id }}"{{ request('priority') == $priority->id ? 'selected' : '' }}>{{ $priority->name }}</option>
      @endforeach
            </select>
          </div>
          <div class="form-group mx-sm-2 mb-2">
            <select class="form-control" name="category">
              <option value="">Categorias</option>
      @foreach($categories as $category)
            <option value="{{ $category->id }}"{{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
      @endforeach
            </select>
          </div>
        </form>`;

            $('.card-body').on('change', 'select', function () {
                $('#filtersForm').submit();
            })

            let dtButtons = ['copy','excel']
            @can('ticket_delete')
            let deleteButtonTrans = 'Borrar';
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.tickets.massDestroy') }}",
                className: 'btn btn-outline-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({selected: true}).data(), function (entry) {
                        return entry.id
                    });

                    if (ids.length === 0) {
                        alert('No hay seleccionados')

                        return
                    }
                    if (confirm('Esta seguro')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: {ids: ids, _method: 'DELETE'}
                        })
                            .done(function () {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan


            let searchParams = new URLSearchParams(window.location.search)
            let dtOverrideGlobals = {
                buttons: dtButtons,
                processing: true,
                serverSide: true,
                retrieve: true,
                aaSorting: [],
                ajax: {
                    url: "{{ route('admin.tickets.index') }}",
                    data: {
                        'status': searchParams.get('status'),
                        'priority': searchParams.get('priority'),
                        'category': searchParams.get('category')
                    }
                },
                columns: [
                    {data: 'placeholder', name: 'placeholder'},
                    {data: 'id', name: 'id'},

                    {
                        data: 'title',
                        name: 'title',

                    },
                    {
                        data: 'status_name',
                        name: 'status.name',
                        render: function (data, type, row) {
                            return '<span style="color:' + row.status_color + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'priority_name',
                        name: 'priority.name',
                        render: function (data, type, row) {
                            return '<span style="color:' + row.priority_color + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'category_name',
                        name: 'category.name',
                        render: function (data, type, row) {
                            return '<span style="color:' + row.category_color + '">' + data + '</span>';
                        }
                    },
                    {data: 'author_name', name: 'author_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'department', name: 'department.name'},
                    {data: 'assigned_to_user_name', name: 'assigned_to_user.name'},
                    {data: 'actions', name: 'Acciones'}
                ],
                order: [[7, 'DESC']],
                pageLength: 20,
            };
            $(".datatable-Ticket").one("preInit.dt", function () {
                $(".dataTables_filter").after(filters);
            });
            $('.datatable-Ticket').DataTable(dtOverrideGlobals);
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        });

    </script>
@endsection
