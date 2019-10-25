@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/update/{{$equipment->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Equipment & Unit Data</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Equipment Number</label>
                        <input type="text" name="equipment_number" value="{{$equipment->equipment_number}}" class="form-control" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="">Equipment Category</label>
                        <input type="text" name="equipment_category" value="{{$equipment->equipment_category}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" value="{{$equipment->location}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="text" name="fuel_capacity" value="{{$equipment->fuel_capacity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Machine Hours</label>
                        <input type="text" name="machine_hours" value="{{$equipment->machine_hours}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Machine Hours</label>
                        <input type="text" name="last_machine_hours" value="{{$equipment->last_machine_hours}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Std Consumption</label>
                    <input type="text" name="std_consumption" class="form-control" value="{{$equipment->std_consumption}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Last Ending Stock</label>
                        <input type="text" name="last_ending_stock" class="form-control" value="{{$equipment->last_ending_stock}}">
                    </div>

                    <div class="form-group">
                        <label for="">Add Fuel</label>
                        <input type="text" name="add_fuel" class="form-control" value="{{$equipment->add_fuel}}">
                    </div>

                    <div class="form-group">
                        <label for="">Last Maintenance</label>
                        <input type="text" name="last_maintenance" class="form-control" value="{{$equipment->last_maintenance}}">
                    </div>

                    <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" name="pic" class="form-control" value="{{$equipment->pic}}">
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/equipment" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')