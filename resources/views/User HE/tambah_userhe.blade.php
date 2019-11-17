@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/userhe/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Timesheet Heavy Equipment</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>No Alat</label>
						{{ Form::select('equipment_id', $equipments, null, ['placeholder' => 'Pilih equipment...', 'required', 'class' => 'form-control', 'style'=> 'height:100%;']) }}
					</div>

					<div class="form-group">
						<label>Tanggal Operasi</label>
						<input type="date" name="tanggal_operasi" placeholder="" class="form-control" required
							autofocus>
					</div>

					<div class="form-group">
						<label>Area Kerja</label>
						<input type="text" name="nama_unit" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>HM Awal</label>
								<input type="number" id="hmawal" onkeyup="sum()" ; name="hm_awal" placeholder=""
									class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>KM Awal</label>
								<input type="number" id="kmawal" onkeyup="sum();" name="km_awal" placeholder=""
									class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>HM Akhir</label>
								<input type="number" id="hmakhir" onkeyup="sum();" name="hm_akhir" placeholder=""
									class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>KM Akhir</label>
								<input type="number" id="kmakhir" onkeyup="sum();" name="km_akhir" placeholder=""
									class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Jam</label>
								<input type="number" id="totaljam" name="total_jam" placeholder="" class="form-control"
									readonly>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Total KM</label>
								<input type="number" id="totalkm" name="km_total" placeholder="" class="form-control"
									readonly>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Status</label>
								{{ Form::select('timesheetstatus_id', $statuses, null, ['placeholder' => 'Pilih status...', 'required', 'class' => 'form-control status-opt-group']) }}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>Job Order</label>
						<textarea name="job_order" class="form-control" rows="3" required autocomplete=""></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>BBM</label>
								<input type="text" name="bbm" placeholder="" class="form-control" required
									autocomplete="">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Operator</label>
								<input type="text" name="operator" placeholder="" class="form-control" required
									autocomplete="">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Helper</label>
								<input type="text" name="helper" placeholder="" class="form-control" required
									autocomplete="">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Pengawas</label>
								<input type="text" name="pengawas" value="{{ \Auth::user()->name }}" class="form-control" disabled>
							</div>
						</div>
					</div>

				</div>

				<div class="card-footer">

					<a href="/userhe" class="btn btn-default">Back</a>
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
	function formatState(state) {
		if (!state.id) {
			return state.text;
		}

		var baseUrl = "/user/pages/images/flags";
		var $state = $(
			'<span><label></label> - <span></span></span>'
		);

		var parentText = $(state.element.parentElement).attr('label');

		// Use .text() instead of HTML string concatenation to avoid script injection issues
		$state.find("span").text(state.text);
		$state.find("label").text(parentText);

		return $state;
	};

	$('.status-opt-group').select2({
		templateSelection: formatState,
		height:100
	})

	function sum() {
		var hm1 = document.getElementById('hmawal').value;
		var hm2 = document.getElementById('hmakhir').value;
		var km1 = document.getElementById('kmawal').value;
		var km2 = document.getElementById('kmakhir').value;
		var result = parseInt(hm1) + parseInt(hm2);
		var hasil = parseInt(km1) + parseInt(km2);
		if (!isNaN(result, hasil)) {
			document.getElementById('totaljam').value = result,
				document.getElementById('totalkm').value = hasil;
		}
	}
</script>

@endpush