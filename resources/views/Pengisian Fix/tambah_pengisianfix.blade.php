@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengisian_fix/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Add Good Issue On Fix Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
                        <label>Equipment Number</label>
                        <input id="equipment-number" name="eq_label" class="form-control" required />
                        <input type="hidden" id="equipment-number-value" name="equipment_id" class="form-control"
                            required />
                    </div>
    

					<div class="form-group">
                        <label>Driver</label>
                        <input id="equipmentuser" name="equser_label" class="form-control" required />
                        <input type="hidden" id="equipmentuser-value" name="equipmentuser_id" class="form-control"
                            required />
                    </div>
                    
                    <div class="form-group">
                        <label>Qty Solar</label>
						<input type="number" name="qty" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Odometer</label>
						<input type="number" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Remark</label>
						<input type="text" name="remark" placeholder="" class="form-control" required autocomplete="">
                    </div>
                    
                    {!! Form::hidden('origin', 'Fix Station') !!}
                    {!! Form::hidden('station_id', '1') !!}
                    {!! Form::hidden('loginuser_id', \Auth::user()->id) !!}

				</div>

				<div class="card-footer">

					<a href="/pengisian_fix" class="btn btn-default">Back</a>
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
		var local_sourceequipment = {!!$equipments->toJson() !!};
		var local_sourceequsers = {!!$users->toJson() !!};
        var local_sourcevouchers = {!!$users->toJson() !!};

        console.log(local_source);

        $('#equipment-number').autocomplete({
            source: function (request, response) {
                response($.map(local_sourceequipment, function (item, key) {
                    var equipment_number = item.equipment_number.toUpperCase();
                    
                    if (equipment_number.indexOf(request.term.toUpperCase()) != -1) {	
                        return {
                            id: item.id,
                            value: item.equipment_number,
                            label: item.equipment_number,
                            owner: item.equipmentowner.vendor_name,
                            category: item.equipmentcategory.nama
                        }
                    }else{
                        return null;
                    }
                }))
            },
            focus: function(event, ui) {
                event.preventDefault();
            },
            select: function (event, ui) {
                console.log(ui);
                $('#equipment-number').val(ui.item.value);
                $('#equipment-number-value').val(ui.item.id);
                // $('#equipment-number').val(ui.item.label); // display the selected text
                // $('#equipment-number_id').val(ui.item.value); // save selected id to hidden input
                return false;
            },
            change: function (event, ui) {
                console.log(ui);
                $("#equipment-number-value").val(ui.item ? ui.item.id : 0);
                // $('.equipment-owner').val(ui.item.owner ? ui.item.owner : 0);
                // $('.equipment-category').val(ui.item.category ? ui.item.category : 0);
            }
        });

        $('#equipmentuser').autocomplete({
            source: function (request, response) {
                response($.map(local_sourceequsers, function (item, key) {
                    var equipment_number = item.equipment_number.toUpperCase();
                    
                    if (equipment_number.indexOf(request.term.toUpperCase()) != -1) {	
                        return {
                            id: item.id,
                            value: item.equipment_number,
                            label: item.equipment_number,
                            owner: item.equipmentowner.vendor_name,
                            category: item.equipmentcategory.nama
                        }
                    }else{
                        return null;
                    }
                }))
            },
            focus: function(event, ui) {
                event.preventDefault();
            },
            select: function (event, ui) {
                console.log(ui);
                $('#equipment-number').val(ui.item.value);
                $('#equipment-number-value').val(ui.item.id);
                $('.equipment-owner').val(ui.item.owner);
                $('.equipment-category').val(ui.item.category);
                $('#equipment-number').val(ui.item.label); // display the selected text
                // $('#equipment-number_id').val(ui.item.value); // save selected id to hidden input
                return false;
            },
            change: function (event, ui) {
                console.log(ui);
                $("#equipment-number-value").val(ui.item ? ui.item.id : 0);
                $('.equipment-owner').val(ui.item.owner ? ui.item.owner : 0);
                $('.equipment-category').val(ui.item.category ? ui.item.category : 0);
            }
        });
	</script>

@endpush