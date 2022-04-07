@extends('layouts.app')

@section('content')
<div class="row">
    @foreach( $tree_species as $key => $tree_specie )
    <div class="col-xs-6 col-sm-4 col-md-3 text-center">
        <a href="{{ route('tree_specie.getShow', ['id' => $tree_specie->id]) }}">
            <img src="{{ asset('tree_species/' . $tree_specie->image) }}" class="mx-auto d-block" style="height:200px" />
            <h4 style="min-height:45px;margin:5px 0 10px 0">
                {{$tree_specie->common_name}}
            </h4>
        </a>
    </div>
    @endforeach
</div>
@endsection
