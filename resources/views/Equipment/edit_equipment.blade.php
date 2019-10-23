@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/update/{{$equipment->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Equipment Name</label>
                        <input type="text" name="equipment_name" value="{{$equipment->equipment_name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Equipment Number</label>
                        <input type="text" name="equipment_number" value="{{$equipment->equipment_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Equipment Category</label>
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
                        <label for="">Last Machine Hours</label>
                        <input type="text" name="last_machine_hours" class="form-control" value="{{$equipment->last_machine_hours}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Last Maintenance</label>
                    <input type="text" name="last_maintenance" class="form-control" value="{{$equipment->last_maintenance}}" required autofocus>
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