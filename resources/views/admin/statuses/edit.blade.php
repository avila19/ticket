@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Editar Estado
    </div>

    <div class="card-body">
        <form action="{{ route("admin.statuses.update", [$status->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Nombre*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($status) ? $status->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.status.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                <label for="color">Color</label>
                <input type="text" id="color" name="color" class="form-control colorpicker" value="{{ old('color', isset($status) ? $status->color : '') }}">
                @if($errors->has('color'))
                    <em class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.status.fields.color_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-success" type="submit" value="Guardar">
            </div>
        </form>


    </div>
</div>
@endsection

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
<script>
    $('.colorpicker').colorpicker();
</script>
@endsection