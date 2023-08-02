@extends('sistema.layout')
@section('body')
    <pre>{{print_r($dados)}}</pre>
    --------------------------------
    @foreach($dados as $item)
        <pre>{{print_r($item)}}</pre>
        {{$item[0]}}
        {{$item[1]}}
    @endforeach

@endsection