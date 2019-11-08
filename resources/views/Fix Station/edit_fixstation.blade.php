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

                    <div id="tanks">
                            @foreach ($tanks as $tank)
                                <div id="{{ $loop->first ? 'tank' : ''}}">
                                    <div class="form-group">
                                        <label>Tank Number</label>
                                    <input type="text" name="tank_number[]" value="{{ $tank->tank_number }}" placeholder="" class="form-control" required autocomplete="">
                                    </div> 
        
                                    <div class="form-group">
                                        <label>Tank Capacity</label>
                                        <div class="input-group">
                                        <input type="number" name="fuel_capacity[]" value="{{ $tank->fuel_capacity }}" placeholder="" class="form-control" required autocomplete="">
                                            <div class="input-group-btn">
                                                @if ($loop->first)
                                                    {{-- <button id="addtank" class="btn btn-success" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </button> --}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="form-"></div>
                                </div>    
                            @endforeach
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