@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/consignment/update/{{$consignment->id}}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Consignment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Equipment</label>
                        <input type="text" name="equipment" value="{{$consignment->equipment}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Gas Station</label>
                        <input type="text" name="gas_station" value="{{$consignment->gas_station}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Measuring Date</label>
                        <input type="date" name="measuring_date" value="{{$consignment->measuring_date}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Measuring Time</label>
                        <input type="text" name="measuring_time" value="{{$consignment->measuring_time}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Measuring Position</label>
                        <input type="text" name="measuring_position" value="{{$consignment->measuring_position}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Fluid Type</label>
                        <input type="text" name="fluid_type" value="{{$consignment->fluid_type}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Fluid Consumption</label>
                        <input type="text" name="fluid_consumption" value="{{$consignment->fluid_consumption}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Hourmeter</label>
                        <input type="text" name="hourmeter" value="{{$consignment->hourmeter}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Odometer</label>
                        <input type="number" name="odometer" value="{{$consignment->odometer}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">SS</label>
                        <input type="text" name="ss" value="{{$consignment->ss}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Vendor</label>
                        <input type="text" name="vendor" value="{{$consignment->vendor}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Reported By</label>
                        <input type="text" name="reported_by" value="{{$consignment->reported_by}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Received By</label>
                        <input type="text" name="received_by" value="{{$consignment->received_by}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/consignment" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')