@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Tambah Equipment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
						<label>Nama Company</label>
						{{ Form::select('companycode_id', $companycodes, null, ['placeholder' => 'Pilih company...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Equipment info</label>
                        <input type="text " name="equipment_info" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Equipment Category</label>
                        {{ Form::select('equipment_category', $equipment_categories, null, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group own-status-container">
						<label for="">Status Kendaraan</label>
                        {{ Form::select('status_vehicle', ['Rental' => 'Rental', 'Internal' => 'Internal'], old('status_vehicle'), ['placeholder' => 'Pilih status...', 'required', 'class' => 'form-control own-status']) }}
                    </div>

                    <div class="form-group owner-container">
                        <label>Owner</label>
                        {{ Form::select('owner_id', $owners, null, ['placeholder' => 'Pilih owner...', 'required', 'class' => 'form-control owner']) }}
                    </div>

                    <div class="form-group plat-nomor-container">
                        <label>Nomor Lambung/Plat Nomor</label>
                        <input type="text" name="" placeholder="" class="form-control plat-nomor" required autofocus>
                    </div>

                    <div class="form-group unique-number-container">
                        <label>Equipment Unique Number</label>
                        <input type="text" name="equipment_number" placeholder="" class="form-control unique-number" readonly>
                    </div>
 
                    <div class="form-group">
                        <label>Equipment Type</label>
                        {{ Form::select('equipment_type', $tipe, null, ['placeholder' => 'Pilih Tipe Equipment....', 'required', 'class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label>Manufacture</label>
                        {{ Form::select('manufacture_id', $manufactures, null, ['placeholder' => 'Pilih Manufacture....', 'required', 'class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        <label>Nomor Rangka</label>
                        <input type="text" name="nomor_rangka" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Nomor Mesin</label>
                        <input type="text" name="nomor_mesin" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Equipment Name</label>
                        <input type="text " name="equipment_name" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="number" name="fuel_capacity" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Odometer</label>
                        <input type="number" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Machine Hours</label>
                        <input type="number" name="machinehours" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Last Ending Stock</label>
                        <input type="number" name="ending_stock" placeholder="" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/equipment" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Save" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>
@endsection

@push('scripts')
    <script>
        var unique_number = "";
        var zeros = "0";
        var lastId = "{{ $last_id }}"
        $('.plat-nomor-container').hide();
        $('.unique-number-container').hide();
        $('.owner-container').hide();
        
        $('.own-status').change(function(){
            console.log("HAI");
            if ($(this).val() == "Internal") {
                unique_number = "I";
                $('.owner-container').show();
            }else if($(this).val() == "Rental") {
                unique_number = 'X';
                $('.owner-container').show();
            }else{
                $('.owner-container').hide();
            }
        });

        $('.owner').change(function(){
            if ($(this).val() > 0) {
                unique_number = unique_number + $(this).val();
                $('.plat-nomor-container').show();
            }else{
                $('.plat-nomor-container').hide();   
            }
        });

        $('.plat-nomor').on('input',function(){
            console.log("HAI");
            console.log($(this).val());
            
            if ($(this).val().length > 0) {
                $('.unique-number-container').show();
                console.log(unique_number);
                var unique_id = zeros.repeat(6 - lastId.length) + lastId;
                // unique_number = ;
                $('.unique-number').val(unique_number + $(this).val() + unique_id); 
            }
        })
    </script>
@endpush