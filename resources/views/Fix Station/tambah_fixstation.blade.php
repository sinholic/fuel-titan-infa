@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/fix/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Fix Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Company Code</label>
						<input id="company-code" name="cc_label" value="{{ old('cc_label')}}" class="form-control"
							required placeholder="Cari company code" />
						<input type="hidden" id="company-code-value"
							name="companycode_id" class="form-control" required />
					</div>

					<div class="form-group">
						<label>Code Station</label>
						<input type="text " name="name_station" value="{{ old('name_station')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" name="address" value="{{ old('address')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group nama-lokasi">
						<label>Name Description</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text inisial" id="basic-addon3">Company Code</span>
							</div>
							<input type="text" class="form-control" name="nama_lokasi" value="{{ old('nama_lokasi')}}" id="nama-lokasi"
								aria-describedby="basic-addon3">

							{!! Form::hidden('inisial_lokasi', NULL, ['id' => 'inisial-lokasi']) !!}
						</div>
					</div>

					<div class="form-group">
						<label>Koordinat GPS</label>
						<input type="text" name="koordinat_gps" value="{{ old('koordinat_gps')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div id="tanks">
						<div id="tank">
							<div class="form-group">
								<label>Tank Number</label>
								<input type="text" name="tank_number[]" placeholder="" class="form-control" required
									autocomplete="">
							</div>

							<div class="form-group">
								<label>Tank Capacity</label>
								<div class="input-group">
									<input type="number" name="fuel_capacity[]" placeholder="" class="form-control"
										required autocomplete="">
									<div class="input-group-btn">
										<button id="addtank" class="btn btn-success" type="button">
											<i class="fa fa-plus"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="card-footer">
					<a href="/fix" class="btn btn-default">Back</a>
					&nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>

@endsection

@push('scripts')

<style>
	.ui-autocomplete {
		z-index: 99999; /* adjust this value */
	}
</style>

<script>
	$('#addtank').click(function () {
		console.log("HAI");

		var tank = $('#tank');
		var clone = $('#tank').clone();
		clone.find('.btn').remove();
		clone.appendTo("#tanks");
	})

	var local_source = {!!$companycodes->toJson() !!};

	console.log(local_source);
	$('.nama-lokasi').hide();

	$('#nama-lokasi').mask('00-A', {
		translation: {
			A: {
				pattern: /[A-Za-z0-9]/,
				recursive: true
			},
		},
		placeholder: "00-____________________________________________________________"
	});

	$('#company-code').autocomplete({
		source: function (request, response) {
			response($.map(local_source, function (item, key) {

				var company_name = item.company_name.toUpperCase();

				if (company_name.indexOf(request.term.toUpperCase()) != -1) {
					return {
						id: item.id,
						value: item.company_name,
						inisial: item.company_inisial.substr(0, 2)
					}
				} else {
					return null;
				}
			}))
		},
		select: function (event, ui) {
			$('.nama-lokasi').show();
			$('#company-code').val(ui.item.value);
			$('#company-code-value').val(ui.item.id);
			$('#inisial-lokasi').val(ui.item.inisial);
			$('.inisial').html(ui.item.inisial);
			return false;
		},
		change: function (event, ui) {
			console.log(ui);
			$('#company-code').val(ui.item ? ui.item.value : 0);
			$("#company-code-value").val(ui.item ? ui.item.id : 0);
			$('#inisial-lokasi').val(ui.item ? ui.item.inisial : ui.item.inisial);
		},
	});
</script>
@endpush