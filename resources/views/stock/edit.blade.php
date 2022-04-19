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
                            <h6><b>Descripción: </b>{{$tree_specie->description}}</h6>
                            <form action="{{ route('stock.putEdit') }}" method="POST" enctype="multipart/form-data">
                                {{method_field('PUT')}}
                                {{ csrf_field() }}

                                <input type="hidden" name="id" id="id" value="{{$tree_specie->stock->id}}">

                                <div class="form-group">
                                    <label for="quantity">Existencias</label>
                                    <input type="number" value="{{$tree_specie->stock->quantity}}" name="quantity" id="quantity" class="form-control">
                                </div>

                                <div class="d-grid gap-2 d-md-block mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Guardar
                                    </button>
                                    <a href="{{ route('stock.getIndex')  }}" class="btn btn-light" role="button">Volver al inventario</a>
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
