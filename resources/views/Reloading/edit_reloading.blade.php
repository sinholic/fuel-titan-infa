@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/reloading/update/{{$reloading->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengisian Ulang Mobile Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>No. PO/SJ/SPK</label>
                        <input type="text" name="no_po" value="{{$reloading->no_po}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Mobile Station</label>
                        <input type="text" name="unit_mobile_station" value="{{$reloading->unit_mobile_station}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Driver Mobile Statis</label>
                        <input type="text" name="driver_mobile_statis" value="{{$reloading->driver_mobile_statis}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Qty Solar</label>
                        <input type="text" name="qty_solar" value="{{$reloading->qty_solar}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Odometer (Km)</label>
                        <input type="text" name="odometer" value="{{$reloading->odometer}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/reloading" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')