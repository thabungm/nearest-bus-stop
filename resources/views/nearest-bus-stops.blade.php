@extends('adminlte::page')


@section('content_header')
    <div class="row">
        <div class="col-lg-4">
            <h1>Nearest Bus Stops</h1>
        </div>
        <div cass="col-lg-6">
            <a class='btn btn-success btn-sm'
            href="<?php echo route('nearestStops', ['latitude' => 1.333164, 'longitude' => 103.741839]); ?>">My Current Location 1</a>
            <a class='btn btn-warning btn-sm'
            href="<?php echo route('nearestStops', ['latitude' =>1.323914, 'longitude' => 103.931164]); ?>">My Current Location 2</a>
            <a class='btn btn-danger btn-sm'
            href="<?php echo route('nearestStops', ['latitude' => 1.351055, 'longitude' => 103.753869]); ?>">My Current Location 3</a>
        </div>
    </div>
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
                            <th>Stop Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($busStops as $stop)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$stop->name}}</td>
                            <td>{{$stop->latitude}}</td>
                            <td>{{$stop->longitude}}</td>
                            <td>
                            <button class="btn btn-success" onclick="getBusDetails({{$stop->id}})">View Buses</button>          
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title text-center">Bus Details</h4>
                        </div>
                        <div id="bus-details">
                        
                        </div>
                        </div>

                    </div>
            
                </div>
        </div>
    </div>
@stop

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script type="text/javascript">
    function getBusDetails(busStopId) {
        $.ajax({url: "/bus-stops/"+busStopId+"/buses", success: function(result){
            $('#bus-details').html(result);
            $('#myModal').modal();
        }});
    }
</script>