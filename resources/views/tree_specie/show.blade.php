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
                            <div class="d-grid gap-2 d-md-block">
                                @role('admin')
                                <form action="{{ route('tree_specie.delete')  }}" method="POST" style="display : inline;">
                                    {{method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" value="{{$tree_specie->id}}">
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar especie
                                    </button>
                                </form>
                                <a href=" {{ route('tree_specie.getEdit', ['id' => $tree_specie->id]) }}" class="btn btn-warning" role="button">Editar especie</a>
                                <a href=" {{ route('stock.getEdit', ['id' => $tree_specie->id]) }}" class="btn btn-info" role="button">Editar existencias</a>
                                @endrole
                                @if(Route::is('tree_specie.getShow') )
                                <a href="{{ route('tree_specie.getIndex')  }}" class="btn btn-light" role="button">Volver</a>
                                @endif
                                @if(Route::is('stock.getShow') )
                                <a href="{{ route('stock.getIndex')  }}" class="btn btn-light" role="button">Volver</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
