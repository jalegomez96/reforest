@extends('layouts.app')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Modificar especie
            </div>
            <div class="card-body" style="padding:30px">

                <form action="{{ route('tree_specie.putEdit') }}" method="POST" enctype="multipart/form-data">
                    {{method_field('PUT')}}
                    {{ csrf_field() }}

                    <input type="hidden" name="id" id="id" value="{{$tree_specie->id}}">
                    <div class="form-group">
                        <label for="scientific_name">Nombre científico</label>
                        <input type="text" name="scientific_name" id="scientific_name" value="{{$tree_specie->scientific_name}}" class=" form-control">
                    </div>

                    <div class="form-group">
                        <label for="common_name">Nombre común</label>
                        <input type="text" name="common_name" id="common_name" value="{{$tree_specie->common_name}}" class=" form-control">
                    </div>

                    <div class="form-group">
                        <label for="family">Familia</label>
                        <input type="text" name="family" id="family" value="{{$tree_specie->family}}" class=" form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" name="description" id="description" value="{{$tree_specie->description}}" class=" form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Guardar cambios
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
