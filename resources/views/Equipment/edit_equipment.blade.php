@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/update/{{$equipment->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Equipment & Unit Data</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
						<label>Nama Company</label>
						{{ Form::select('companycode_id', $companycodes, $equipment->companycode_id, ['placeholder' => 'Pilih company...', 'disabled', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Equipment Info</label>
                        <input type="text " name="equipment_info" value="{{ $equipment->equipment_info }}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Equipment Category</label>
                        {{ Form::select('equipment_category', $equipment_categories, $equipment->equipment_category, ['placeholder' => 'Pilih kategori...', 'disabled', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Status Kendaraan</label>
                        {{ Form::select('status_vehicle', ['Rental' => 'Rental', 'Internal' => 'Internal'], $equipment->status_vehicle, ['placeholder' => 'Pilih status...', 'disabled', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label for="">Owner</label>
                        {{ Form::select('owner_id', $owners, $equipment->owner_id, ['placeholder' => 'Pilih owner...', 'disabled', 'class' => 'form-control']) }}
                    </div>

                    @php
                        $statusVehicle = ($equipment->status_vehicle == "Internal" ? "I" : "X");
                        $companyCode = $equipment->companycode_id;
                        $prefix = $statusVehicle.$companyCode;

                    @endphp

                    <div class="form-group plat-nomor-container">
                        <label>Nomor Lambung/Plat Nomor</label>
                        <input type="text" name="" value="{{ substr($equipment->equipment_number, strlen($prefix), -6) }}" placeholder="" class="form-control plat-nomor" disabled autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label>Equipment Number</label>
                        <input type="text" name="equipment_number" value="{{$equipment->equipment_number}}" class="form-control" readonly>
                    </div>
 
                    <div class="form-group">
                        <label>Equipment Type</label>
                        {{ Form::select('equipment_type', $tipe, $equipment->equipment_type, ['placeholder' => 'Pilih Tipe Equipment....', 'required', 'class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label>Manufacture</label>
                        {{ Form::select('manufacture_id', $manufactures, $equipment->manufacture_id, ['placeholder' => 'Pilih Manufacture....', 'required', 'class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label>Nomor Rangka</label>
                        <input type="text " name="nomor_rangka" value="{{ $equipment->nomor_rangka }}" class="form-control" {{ (isset($equipment->nomor_rangka) ? 'readonly' : '') }}>
                    </div>

                    <div class="form-group">
                        <label>Nomor Mesin</label>
                        <input type="text " name="nomor_mesin" value="{{ $equipment->nomor_mesin }}" class="form-control" {{ (isset($equipment->nomor_mesin) ? 'readonly' : '') }}>
                    </div>

                    <div class="form-group">
                        <label>Equipment Name</label>
                        <input type="text" name="equipment_name" value="{{$equipment->equipment_name}}" class="form-control" required autofocus>
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
                        <label>Last Odometer</label>
                        <input type="text" name="odometer" value="{{ $equipment->reloadingunits->last()->odometer }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label>Last Machine Hours</label>
                        <input type="text" name="machinehours" value="{{ $equipment->reloadingunits->last()->machinehours }}" class="form-control" disabled>
                    </div>
                </div>

                <div class="card-footer">

                    <a href="/equipment" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')