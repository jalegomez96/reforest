@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{ asset('tree_species/' . $tree_specie->image) }}" style="height:600px" />
    </div>
    <div class="col-sm-8">

        <h1>{{$tree_specie->common_name}}</h1>
        <h3><b>Nombre científico: </b>{{$tree_specie->scientific_name}}</h3>
        <h3><b>Familia: </b>{{$tree_specie->family}}</h3>
        <br>
        <h5><b>Descripción: </b>{{$tree_specie->description}}</h5>
        <br>

        <div class="d-grid gap-2 d-md-block">
            <form action="{{ route('tree_specie.delete')  }}" method="POST" style="display : inline;">
                {{method_field('DELETE')}}
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id" value="{{$tree_specie->id}}">
                <button type="submit" class="btn btn-danger">
                    Eliminar especie
                </button>
            </form>
            <a href=" {{ route('tree_specie.getEdit', ['id' => $tree_specie->id]) }}" class="btn btn-warning" role="button">Editar especie</a>
            <a href="{{ route('tree_specie.getIndex')  }}" class="btn btn-light" role="button">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
