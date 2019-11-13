@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/mobile/update/{{$mobile->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Mobile Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Fix Station</label>
                        {{ Form::select('fixstation_id', $fixstations, $mobile->fixstation_id, ['placeholder' => 'Pilih fix station...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Nomor Vehicle</label>
                        <input type="text" name="number_vehicle" value="{{$mobile->number_vehicle}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Nama Vehicle</label>
                        <input type="text" name="name_vehicle" value="{{$mobile->name_vehicle}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label for="exampleFormControlSelect1">Status Kendaraan</label>
						<select class="form-control" aria-placeholder="Pilih Status.." name="status_vehicle" id="exampleFormControlSelect1">
						<option>Rental</option>
						<option>Internal</option>
						</select>
					</div>

                    <div class="form-group">
                        <label>Kapasitas Tangki</label>
                        <input type="number" name="fuel_capacity" value="{{$mobile->fuel_capacity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Maksimal Pengisian Ulang</label>
                        <input type="text" name="fuel_max_reload" value="{{$mobile->fuel_max_reload}}" placeholder="" class="form-control" required autocomplete="">
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/mobile" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')