@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/consignment/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Tambah Consignment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('<br/>', $errors->all(':message'))}}
                    </div>
                    @endif


                    <div class="form-group">
                        <label>Equipment</label>
                        <input type="text" name="equipment" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Gas Station</label>
                        <input type="text" name="gas_station" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Measuring Date</label>
                        <input type="date" name="measuring_date" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Measuring Time</label>
                        <input type="text" name="measuring_time" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Measuring Position</label>
                        <input type="text" name="measuring_position" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fluid Type</label>
                        <input type="text" name="fluid_type" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fluid Consumption</label>
                        <input type="text" name="fluid_consumption" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Hourmeter</label>
                        <input type="text" name="hourmeter" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="number" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>SS</label>
                        <input type="text" name="SS" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Vendor</label>
                        <input type="text" name="vendor" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Reported By</label>
                        <input type="text" name="reported_by" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Received By</label>
                        <input type="text" name="received_by" placeholder="" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/consignment" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Save" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>

@endsection