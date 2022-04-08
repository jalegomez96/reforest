@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('tree_species/' . $lot_of_tree->tree_specie->image) }}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h1>{{$lot_of_tree->tree_specie->common_name}}</h1>
                            <h5><b>Nombre científico: </b>{{$lot_of_tree->tree_specie->scientific_name}}</h5>
                            <h5><b>Familia: </b>{{$lot_of_tree->tree_specie->family}}</h5>
                            <h6><b>Descripción: </b>{{$lot_of_tree->tree_specie->description}}</h6>
                            @role('admin')
                            <h6><b>Usuario: </b>{{$lot_of_tree->user->name}}</h6>
                            @endrole
                            <h6><b>Cantidad: </b>{{$lot_of_tree->quantity}}</h6>
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
                            <div class="d-grid gap-2 d-md-block">

                                @if($lot_of_tree->status=='PA')
                                <a href=" {{ asset('proof_of_payments/' . $lot_of_tree->proof_of_payment) }}" class="btn btn-warning" role="button" target="_blank">Ver comprobante</a>
                                @role('admin')
                                <form action="{{ route('lot_of_tree.putApprove')  }}" method="POST" style="display : inline;">
                                    {{method_field('PUT')}}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" value="{{$lot_of_tree->id}}">
                                    <button type="submit" class="btn btn-info">
                                        Aprobar
                                    </button>
                                </form>
                                <form action="{{ route('lot_of_tree.putDeny')  }}" method="POST" style="display : inline;">
                                    {{method_field('PUT')}}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id" value="{{$lot_of_tree->id}}">
                                    <button type="submit" class="btn btn-danger">
                                        Rechazar
                                    </button>
                                </form>
                                @endrole
                                @endif

                                @role('admin')
                                <a href="{{ route('lot_of_tree.getAll')  }}" class="btn btn-light" role="button">Volver al listado</a>
                                @else
                                <a href="{{ route('lot_of_tree.getIndex')  }}" class="btn btn-light" role="button">Volver al listado</a>
                                @endrole

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
