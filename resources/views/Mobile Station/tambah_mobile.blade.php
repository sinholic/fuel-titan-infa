@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/mobile/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Mobile Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Induk Station</label>
						{{ Form::select('fixstation_id', $fixstations, null, ['placeholder' => 'Pilih fix station...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Nomor Vehicle</label>
						<input type="text " name="number_vehicle" placeholder="" class="form-control" required
							autofocus>
					</div>

					<div class="form-group">
						<label for="">Nama Vehicle</label>
						<input type="text" name="name_vehicle" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label for="exampleFormControlSelect1">Status Kendaraan</label>
						{{ Form::select('status_vehicle', ['Rental' => 'Rental', 'Internal' => 'Internal'], old('status_vehicle'), ['placeholder' => 'Pilih status...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Kapasitas Tangki</label>
						<input type="number" name="fuel_capacity" placeholder="" class="form-control" required
							autofocus>
					</div>

					<div class="form-check">
						{{ Form::checkbox('impress_status', 1, null, ['class' => 'form-check-input enable-impress']) }}
						<label>Enable Impress System</label>
					</div>

					<div class="form-group max-reload">
						<label>Maksimal Pengisian Ulang</label>
						<input type="text" name="fuel_max_reload" placeholder="" class="form-control" required
							autocomplete="">
					</div>

				</div>

				<div class="card-footer">

					<a href="/mobile" class="btn btn-default">Back</a>
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
		$('.max-reload').hide();
		$('.enable-impress').click(function(){
			$('.max-reload').toggle();
		})
	</script>


@endpush