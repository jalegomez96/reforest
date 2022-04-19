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
                        <textarea rows="4" name="description" id="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Costo unitario</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="image">Imagen</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>


                    <div class="row mt-3">
                        <div class="col-sm-6 mb-3">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Guardar
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="d-grid">
                                @if(Route::is('tree_specie.getCreate') )
                                <a href="{{ route('tree_specie.getIndex')  }}" class="btn btn-light" role="button">Volver</a>
                                @endif
                                @if(Route::is('stock.getCreate') )
                                <a href="{{ route('stock.getIndex')  }}" class="btn btn-light" role="button">Volver</a>
                                @endif
                            </div>
                        </div>
                    </div>



                </form>

            </div>
        </div>
    </div>
</div>
@endsection
