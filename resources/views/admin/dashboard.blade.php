@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .sidebar-menu > li.header {
            display:none !important;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop