@extends('layouts.app')

@section('content')
<div class="row" style="margin-top:40px">
    <div class="offset-md-3 col-md-6">
        <div class="card">
            <div class="card-header text-center">
                Añadir especie
            </div>
            <div class="card-body" style="padding:30px">

                <form action="{{ route('tree_specie.postCreate') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="scientific_name">Nombre científico</label>
                        <input type="text" name="scientific_name" id="scientific_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="common_name">Nombre común</label>
                        <input type="text" name="common_name" id="common_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="family">Familia</label>
                        <input type="text" name="family" id="family" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <input type="text" name="description" id="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Guardar
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
