@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/station/update/{{$station->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Code Station</label>
                        <input type="text" name="nama_lokasi" value="{{$station->nama_lokasi}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" value="{{$station->address}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Koordinat GPS</label>
                        <input type="text" name="koordinat_gps" value="{{$station->koordinat_gps}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Tank Number</label>
                        <input type="text" name="tank_number" value="{{$station->tank_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="text" name="fuel_capacity" value="{{$station->fuel_capacity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Assignment</label>
                        <input type="text" name="fuel_assignment" value="{{$station->fuel_assignment}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Last Refuel</label>
                        <input type="text" name="last_refuel" class="form-control" value="{{$station->last_refuel}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Ending Stock Date</label>
                    <input type="text" name="ending_stock_date" class="form-control" value="{{$station->ending_stock_date}}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Ending Stock Quantity</label>
                        <input type="text" name="ending_stock_quantity" class="form-control" value="{{$station->ending_stock_quantity}}">
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/station" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')