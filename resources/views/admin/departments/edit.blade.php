@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Editar Dirección/Departamento
        </div>

        <div class="card-body">
            <form action="{{route('admin.departments.update',[$department->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                    <label for="name">Nombre*</label>
                    <input type="text" id="name" name="name" class="form-control"
                           value="{{ old('name', isset($department) ? $department->name : '') }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción*</label>
                    <input type="description" id="description" name="description" class="form-control"
                           value="{{ old('description', isset($department) ? $department->description : '') }}" required>
                </div>
                <div>
                    <input class="btn btn-success" type="submit" value="Guardar">
                </div>
            </form>
        </div>
    </div>
@endsection
