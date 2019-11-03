@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/fix/update/{{$fix->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Fix Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama Station</label>
                        <input type="text" name="name_station" value="{{$fix->name_station}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" value="{{$fix->address}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" value="{{$fix->nama_lokasi}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Koordinat GPS</label>
                        <input type="text" name="koordinat_gps" value="{{$fix->koordinat_gps}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Tank Number</label>
                        <input type="text" name="tank_number" value="{{$fix->tank_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Kapasitas Tangki</label>
                        <input type="int" name="fuel_capacity" value="{{$fix->fuel_capacity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuelman Assignment</label>
                        <input type="text" name="fuel_assignment" value="{{$fix->fuel_assignment}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Pengisian Terakhir</label>
                        <input type="date" name="last_refuel" value="{{$fix->last_refuel}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Ending Stock Date</label>
                        <input type="date" name="ending_stock_date" value="{{$fix->ending_stock_date}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Ending Stock Quantity</label>
                        <input type="date" name="ending_stock_quantity" value="{{$fix->ending_stock_quantity}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/fix" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')