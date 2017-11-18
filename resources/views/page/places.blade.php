@extends('layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/mapui.css')}}">
    <script src="{{asset('js/map.ui.js')}}"></script>
    <script src="{{asset('js/map.event.js')}}"></script>
 @endsection

@section('content')
    <place></place>
@endsection
