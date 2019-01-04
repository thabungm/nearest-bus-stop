@extends('adminlte::page')

@section('title', 'Upwork')

@section('content_header')
    <h1>Create Bus</h1>
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
        <div class="text-center profile-card box-body">

            <form method="POST" action="{{route('create.bus')}}" class="text-left border border-light p-5">
                @csrf
                <div>
                    <div class="row">
                        <div class="col-lg-6 form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name">Bus Name:</label>
                            <input type="text" name="name" class="form-control mb-4" placeholder="Enter Bus Name" value="{{old('name')}}"/>
                            @if ($errors->has('name'))
                                <label class="error">{{ $errors->first('name') }}</label>
                            @endif
                        </div>
                        <div class="col-lg-6 form-group form-group @if ($errors->has('bus_number')) has-error @endif">
                            <label for="bus_number">Bus Number</label>
                            <input placeholder="Enter Bus Number" type="text" name="bus_number" id="bus_number" value="{{old('bus_number')}}" class="form-control mb-4">
                            @if ($errors->has('bus_number'))
                                <label class="error">{{ $errors->first('bus_number') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group @if ($errors->has('bus_stop')) has-error @endif">
                            <label for="">Select Bus Stop</label>
                            <select name="bus_stop" id="" class="form-control">
                                <option value="" selected disabled>Select</option>
                                @foreach($busStops as $busStop)
                                <option value="{{$busStop->id}}">{{$busStop->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('bus_stop'))
                                <label class="error">{{ $errors->first('bus_stop') }}</label>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 form-group @if ($errors->has('from_route')) has-error @endif">
                            <label for="route">From</label>
                            <input type="text" placeholder="Enter Source route" name="from_route" class="form-control mb-4" value="{{old('from_route')}}" />
                            @if ($errors->has('from_route'))
                                <label class="error">{{ $errors->first('from_route') }}</label>
                            @endif
                        </div>

                        <div class="col-lg-6 form-group @if ($errors->has('to_route')) has-error @endif">
                            <label for="route">To</label>
                            <input placeholder="Enter Destination route"  type="text" name="to_route" class="form-control mb-4" value="{{old('to_route')}}" />
                            @if ($errors->has('to_route'))
                                <label class="error">{{ $errors->first('to_route') }}</label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <input class="btn btn-success mb-4" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>
@stop


