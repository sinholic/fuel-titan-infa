@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/userassign/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Fix/Mobile Station Assignment</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama</label>
						{{ Form::select('user_id', $users, null, ['placeholder' => 'Pilih nama...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Choose Station</label>
						<div class="form-check">
							<input class="form-check-input mobile1" type="radio" name="mobile" id="mobile1" value="1">
							<label class="form-check-label" for="mobile1">
								Mobile Station
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input mobile2" type="radio" name="mobile" id="mobile2" value="0">
							<label class="form-check-label" for="mobile2">
								Fix Station
							</label>
						</div>
					</div>

					<div class="form-group station-container">
						<label id="label-station">Station</label>
						{{ Form::select('', $mobilestations, null, ['placeholder' => 'Pilih nama mobile station...','id' => 'mobile-station', 'class' => 'form-control']) }}
						{{ Form::select('', $fixstations, null, ['placeholder' => 'Pilih nama fix station...', 'id' => 'fix-station', 'class' => 'form-control']) }}
						{!! Form::hidden('station_id', NULL, ['id' => 'station_id']) !!}
					</div>

					<div class="form-group">
						<label>Start Date</label>
						<input type="date" name="start_date" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>End Date</label>
						<input type="date" name="end_date" placeholder="" class="form-control" required autofocus>
					</div>

				</div>

				<div class="card-footer">

					<a href="/userassign" class="btn btn-default">Back</a>
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
	$('.station-container').hide();
	$('input[type=radio][name=mobile]').change(function () {
		if (this.value == 1) {
			$('.station-container').show();
			$('#mobile-station').show();
			$('#fix-station').hide();
		} else if (this.value == 0) {
			$('.station-container').show();
			$('#mobile-station').hide();
			$('#fix-station').show();
		}
	});

	$('select').change(function(){
		$('#station_id').val($(this).val());
	});
</script>

@endpush