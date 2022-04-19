@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('upload_files/tree_species/' . $lot_of_tree->tree_specie->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h1>{{$lot_of_tree->tree_specie->common_name}}</h1>
                            <h5><b>Nombre científico: </b>{{$lot_of_tree->tree_specie->scientific_name}}</h5>
                            <h5><b>Familia: </b>{{$lot_of_tree->tree_specie->family}}</h5>
                            <h6><b>Descripción: </b>{{$lot_of_tree->tree_specie->description}}</h6>
                            <h6><b>Costo unitario: </b>{{$lot_of_tree->tree_specie->price}}</h6>
                            <h6><b>Cantidad: </b>{{$lot_of_tree->quantity}}</h6>
                            <form action="{{ route('lot_of_tree.putEdit') }}" method="POST" enctype="multipart/form-data">
                                {{method_field('PUT')}}
                                {{ csrf_field() }}

                                <input type="hidden" name="id" id="id" value="{{$lot_of_tree->id}}">

                                <div class="form-group">
                                    <label for="proof_of_payment">Comprobante de pago</label>
                                    <input type="file" name="proof_of_payment" id="proof_of_payment" class="form-control">
                                </div>
                                <div class="d-grid gap-2 d-md-block mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        Subir comprobante de pago
                                    </button>
                                    <a href="{{ route('lot_of_tree.getIndex')  }}" class="btn btn-light" role="button">Volver al listado</a>
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
