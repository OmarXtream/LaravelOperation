@extends('layout.master')

@section('title','contact me')

@section('sidebar')
    @parent
    <br>
    This is a Customize SideBar !
@endsection

@section('content')
    <div class="container">
        {{$page_name}}
    </div>
@endsection
