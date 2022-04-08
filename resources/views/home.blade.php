@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('tree_specie.getIndex') }}">Lista de especies</a>
                </div>
                <div class="card-body">
                    <a href="{{ route('lot_of_tree.getIndex') }}">Mi lista de pedidos</a>
                </div>
                @role('admin')
                <div class="card-body">
                    <a href="{{ route('tree_specie.getCreate') }}">Añadir especies</a>
                </div>
                <div class="card-body">
                    <a href="{{ route('lot_of_tree.getAll') }}">Revisar de pedidos</a>
                </div>
                @endrole
            </div>
        </div>
    </div>
</div>
@endsection
