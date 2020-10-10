@extends('layouts.app');

@section('content')

    @foreach($obj as $ob)
    <p> Name : {{$ob}} </p>
    @endforeach
@endsection