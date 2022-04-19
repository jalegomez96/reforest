@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listado de pedidos') }}</div>
                <div class="card-body">
                    @foreach( $lot_of_trees as $lot_of_tree )
                    <div class="card mb-2">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('upload_files/tree_species/' . $lot_of_tree->tree_specie->image) }}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{$lot_of_tree->tree_specie->common_name}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">{{$lot_of_tree->tree_specie->scientific_name}}</h6>
                                    <h6 class="card-text">{{$lot_of_tree->tree_specie->description}}</h6>
                                    @role('admin')
                                    <h6><b>Usuario: </b>{{$lot_of_tree->user->name}}</h6>
                                    @endrole
                                    <h6 class="card-text"><b>Cantidad: </b>{{$lot_of_tree->quantity}}</h6>
                                    <h6 class="card-text"><b>Costo total: </b>{{$lot_of_tree->quantity * $lot_of_tree->tree_specie->price}}</h6>
                                    <h6 class="card-text"><b>Estado: </b>
                                        @switch($lot_of_tree->status)
                                        @case('PPOP')
                                        <span class="badge rounded-pill bg-warning text-dark">Pendiente comprobante de pago</span>
                                        @break
                                        @case('PA')
                                        <span class="badge rounded-pill bg-info text-dark">Pendiente aprobación</span>
                                        @break
                                        @case('A')
                                        <span class="badge rounded-pill bg-success">Aprobado</span>
                                        @break
                                        @case('D')
                                        <span class="badge rounded-pill bg-danger">Rechazado</span>
                                        @break
                                        @default
                                        @endswitch
                                    </h6>

                                    <a href="{{ route('lot_of_tree.getShow', ['id' => $lot_of_tree->id]) }}" class="btn btn-primary">Ver mas</a>

                                    @if(Route::is('lot_of_tree.getIndex') )
                                    @if($lot_of_tree->status=='PPOP')
                                    <a href="{{ route('lot_of_tree.getEdit', ['id' => $lot_of_tree->id]) }}" class="btn btn-primary">Subir comprobante</a>
                                    <form action="{{ route('lot_of_tree.delete')  }}" method="POST" style="display : inline;">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" id="id" value="{{$lot_of_tree->id}}">
                                        <button type="submit" class="btn btn-danger">
                                            Cancelar Pedido
                                        </button>
                                    </form>
                                    @endif
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
