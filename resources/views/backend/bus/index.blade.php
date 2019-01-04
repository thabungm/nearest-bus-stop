
@extends('adminlte::page')

@section('title', 'Upwork')

@section('content_header')
    <h1>Bus List</h1>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .sidebar-menu > li.header {
            display:none !important;
        }
        .navbar-nav {
            display:none;
        }
    </style>
@stop
@section('content')
<div class="box box-primary">
    <div class="box-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Bus Name</th>
                    <th>Bus Route</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($data as $d)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->from_route}} - {{$d->to_route}}</td>
                    <td>
                        <!--<a href="{{route('view.bus',$d->id)}}">View Bus</a>&nbsp;-->
                        <a href="{{route('edit.bus',$d->id)}}" class="btn btn-success">Edit Bus</a>            
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop