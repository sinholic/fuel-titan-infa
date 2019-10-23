@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/unitdata/update/{{$unitdata->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Unit Data</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Unit Number</label>
                        <input type="text" name="unit_number" value="{{$unitdata->unit_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Category</label>
                        <input type="text" name="unit_category" value="{{$unitdata->unit_category}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" value="{{$unitdata->location}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="text" name="fuel_capacity" value="{{$unitdata->fuel_capacity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Std Consumption</label>
                        <input type="text" name="std_consumption" value="{{$unitdata->std_consumption}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Ending Stock</label>
                        <input type="text" name="last_ending_stock" value="{{$unitdata->last_ending_stock}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Additional Fuel</label>
                        <input type="text" name="add_fuel" class="form-control" value="{{$unitdata->add_fuel}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Last Maintenance</label>
                    <input type="text" name="last_maintenance" class="form-control" value="{{$unitdata->last_maintenance}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" name="pic" class="form-control" value="{{$unitdata->pic}}">
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/unitdata" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')