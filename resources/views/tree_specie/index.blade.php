@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Listado de especies') }}
                    <a href="{{ route('tree_specie.getCreate') }}" class="btn btn-sm btn-primary">{{ __('Añadir especie') }}</a>
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach( $tree_species as $key => $tree_specie )
                        <div class="col h-100">
                            <div class="card">
                                <img src="{{ asset('upload_files/tree_species/' . $tree_specie->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$tree_specie->common_name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$tree_specie->scientific_name}}</h6>
                                    <p class="card-text">{{$tree_specie->description}}</p>
                                    <p class="card-text"><b>Costo unitario: </b>{{$tree_specie->price}}</p>
                                    <p class="card-text"><b>Existencias: </b>{{$tree_specie->stock->quantity}}</p>
                                    <a href="{{ route('tree_specie.getShow', ['id' => $tree_specie->id]) }}" class="btn btn-primary">Ver mas</a>
                                    <a href="{{ route('lot_of_tree.getCreate', ['id' => $tree_specie->id]) }}" class="btn btn-primary">Solicitar lote</a>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
