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
                            <p><b>Costo unitario: </b>{{$tree_specie->price}}</p>
                            <p><b>Existencias: </b>{{$tree_specie->stock->quantity}}</p>
                            @if ($tree_specie->stock->quantity === 0)
                            <h4>No hay existencias</h4>
                            <a href="{{ route('tree_specie.getIndex')  }}" class="btn btn-light" role="button">Volver al listado</a>
                            @else
                            <form action="{{ route('lot_of_tree.postCreate') }}" method="POST" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <input type="hidden" name="id_specie" id="id_specie" value="{{$tree_specie->id}}">

                                <div class="form-group">
                                    <label for="direction">Dirección</label>
                                    <input type="text" name="direction" id="direction" class="form-control">
                                </div>

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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
