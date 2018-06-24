@extends('layouts.app')

@section('content')
    @foreach($products as $product)
        {{$product->description}}
    @endforeach
@stop