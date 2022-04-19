@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Inventario') }}
                    <a href="{{ route('stock.getCreate') }}" class="btn btn-sm btn-primary">{{ __('Añadir especie') }}</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nombre común</th>
                                <th scope="col">Nombre científico</th>
                                <th scope="col">Costo unitario</th>
                                <th scope="col">Existencias</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach( $tree_species as $key => $tree_specie )
                            <tr>
                                <th scope="row">{{$tree_specie->id}}</th>
                                <td>{{$tree_specie->common_name}}</td>
                                <td>{{$tree_specie->scientific_name}}</td>
                                <td>{{$tree_specie->price}}</td>
                                <td>{{$tree_specie->stock->quantity}}</td>
                                <td>
                                    <a href="{{ route('stock.getEdit', ['id' => $tree_specie->id]) }}" class="btn btn-sm btn-primary">{{ __('Editar existencias') }}</a>
                                    <a href="{{ route('stock.getShow', ['id' => $tree_specie->id]) }}" class="btn btn-sm btn-primary">{{ __('Ver mas') }}</a>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
