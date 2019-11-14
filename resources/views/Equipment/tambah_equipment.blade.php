@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Tambah Equipment & Unit Data</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>equipment info</label>
                        <input type="text " name="equipment_info" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>equipment type</label>
                        <input type="text " name="equipment_type" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>manufacture</label>
                        <input type="text " name="manufacture_id" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>nomor rangka</label>
                        <input type="text " name="nomor_rangka" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>nomor mesin</label>
                        <input type="text " name="nomor_mesin" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Equipment Number</label>
                        <input type="text " name="equipment_number" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Equipment Name</label>
                        <input type="text " name="equipment_name" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Equipment Category</label>
                        {{ Form::select('equipment_category', $equipment_categories, null, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
						<label for="">Status Kendaraan</label>
                        {{ Form::select('status_vehicle', ['Rental' => 'Rental', 'Internal' => 'Internal'], old('status_vehicle'), ['placeholder' => 'Pilih status...', 'required', 'class' => 'form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="text" name="fuel_capacity" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        {{ Form::select('pic', $owners, null, ['placeholder' => 'Pilih owner...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Last Odometer</label>
                        <input type="text" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Machine Hours</label>
                        <input type="text" name="machinehours" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Ending Stock</label>
                        <input type="text" name="ending_stock" placeholder="" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/equipment" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Add Data" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection