@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/reloading/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengisian Ulang Mobile Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

                    <div class="form-group">
						<label for="">Unit Mobile Station</label>
						<input id="mobile-station-number" name="ms_label" class="form-control" required />
						<input type="hidden" id="mobile-station-number-value" name="mobilestation_id" class="form-control"
							required />
					</div>
					
					<div class="form-group">
						<label>Owner</label>
						<input type="text" name="ms_owner" placeholder="" readonly class="mobile-station-owner form-control" 
							autofocus>
					</div>

                    <div class="form-group">
                        <label for="">Driver Mobile Statis</label>
                        <input type="text" name="driver_mobile_statis" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Qty Solar</label>
						<input type="number" name="qty_solar" placeholder="" class="qty-solar form-control" readonly autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Odometer</label>
						<input type="number" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>

				</div>

				<div class="card-footer">

					<a href="/reloading" class="btn btn-default">Back</a>
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

		var local_source = {!!$equipments->toJson() !!};
		console.log(local_source);
		
		$('#mobile-station-number').autocomplete({
			source: function (request, response) {
				response($.map(local_source, function (item, key) {
					var equipment_number = item.equipment.equipment_number.toUpperCase();
					
					if (equipment_number.indexOf(request.term.toUpperCase()) != -1) {	
						return {
							id: item.id,
							value: item.equipment.equipment_number,
							label: item.equipment.equipment_number,
							owner: item.equipment.equipmentowner.vendor_name,
							category: item.equipment.equipmentcategory.nama,
							reload: (item.impress_status == 1 ? item.fuel_max_reload : item.equipment.fuel_capacity)
							// quantity: item.
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
				$('#mobile-station-number-value').val(ui.item.id);
				$('.mobile-station-owner').val(ui.item.owner);
				$('#mobile-station-number').val(ui.item.label); // display the selected text
				$('.qty-solar').val(ui.item.reload);
				return false;
			},
			change: function (event, ui) {
				console.log(ui);
				$("#mobile-station-number-value").val(ui.item ? ui.item.id : 0);
				$('.mobile-station-owner').val(ui.item.owner ? ui.item.owner : 0);
				$('.qty-solar').val(ui.item.reload ? ui.item.reload : 0);
			}
		});
	</script>
	
@endpush