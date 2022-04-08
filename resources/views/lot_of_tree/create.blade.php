@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('upload_files/tree_species/' . $tree_specie->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h1>{{$tree_specie->common_name}}</h1>
                            <h5><b>Nombre científico: </b>{{$tree_specie->scientific_name}}</h5>
                            <h5><b>Familia: </b>{{$tree_specie->family}}</h5>
                            <p><b>Descripción: </b>{{$tree_specie->description}}</p>
                            <form action="{{ route('lot_of_tree.postCreate') }}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <input type="hidden" name="id_specie" id="id_specie" value="{{$tree_specie->id}}">

                                <div class="form-group">
                                    <label for="quantity">Cantidad</label>
                                    <input type="number" min="1" name="quantity" id="quantity" class="form-control">
                                </div>

                                <div class="d-grid gap-2 d-md-block mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Realizar pedido
                                    </button>
                                    <a href="{{ route('tree_specie.getIndex')  }}" class="btn btn-light" role="button">Volver al listado</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
