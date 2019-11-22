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
					{!! Form::hidden('penyewa', 'Titan') !!}
					<div class="form-group">
						<label>Equipment Number</label>
						<input id="equipment-number" name="eq_label" class="form-control" required />
						<input type="hidden" id="equipment-number-value" name="equipment_id" class="form-control"
							required />
					</div>

					<div class="form-group">
						<label for="">Equipment Category</label>
						<input type="text" name="eq_category" placeholder="" class="equipment-category form-control"
						  autofocus>
					</div>

					<div class="form-group">
						<label>Owner</label>
						<input type="text" name="eq_owner" placeholder="" class="equipment-owner form-control" 
							autofocus>
					</div>

					<div class="form-group">
						<label>Area Kerja</label>
						<input type="text" name="areakerja" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tanggal Operasi</label>
								<input type="date" onchange="validateDate(this.value)" name="tanggal_operasi"
									placeholder="" class="form-control" required autofocus>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>HM Awal</label>
								<input type="number" id="hmawal" onkeyup="sumHM()" ; name="hm_awal" placeholder=""
									class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>KM Awal</label>
								<input type="number" id="kmawal" onkeyup="sumKM();" name="km_awal" placeholder=""
									class="form-control">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>HM Akhir</label>
								<input type="number" id="hmakhir" onkeyup="sumHM();" name="hm_akhir" placeholder=""
									class="form-control">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>KM Akhir</label>
								<input type="number" id="kmakhir" onkeyup="sumKM();" name="km_akhir" placeholder=""
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
						<label>Description</label>
						<textarea name="job_order" class="form-control" rows="3" required autocomplete=""></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>BBM (Liter)</label>
								<input type="number" name="bbm" placeholder="" class="form-control" required
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
								<input type="text" value="{{\Auth::user()->name}}" name="pengawas" placeholder=""
									class="form-control" readonly autocomplete="">
							</div>
						</div>
					</div>

				</div>

				<div class="card-footer">

					<a href="/userhe" class="btn btn-default">Back</a>
					&nbsp;&nbsp;
					<input type="submit" id="adddata" value="Add Data" class="pull-right btn btn-primary">

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

	$('#equipment-number').autocomplete({
		source: function (request, response) {
			response($.map(local_source, function (item, key) {
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
			// console.log(ui);
			$('#equipment-number-value').val(ui.item.id);
			$('.equipment-owner').val(ui.item.owner);
			$('.equipment-category').val(ui.item.category);
			// $('#equipment-number').val(ui.item.label); // display the selected text
			// $('#equipment-number_id').val(ui.item.value); // save selected id to hidden input
			return false;
		},
		change: function (event, ui) {
			console.log(ui);
			$("#equipment-number-value").val(ui.item ? ui.item.id : 0);
		}
	});


	function formatState(state) {

		if (!state.id) {

			return state.text;
		}

		var baseUrl = "/user/pages/images/flags";
		var $state = $(
			'<span><label></label>  <span></span></span>'
		);

		var parentText = $(state.element.parentElement).attr('label');
		// Use .text() instead of HTML string concatenation to avoid script injection issues
		$state.find("span").text(state.text);
		$state.find("label").text(parentText);

		return $state;
	};
	$('.status-opt-group').select2({
		templateSelection: formatState,
		height: 100
	})

	function sumHM() {
		var hm1 = document.getElementById('hmawal').value;
		var hm2 = document.getElementById('hmakhir').value;

		var result = 0;

		if (parseInt(hm1) < parseInt(hm2)) {

			document.getElementById("adddata").disabled = false;

			result = parseInt(hm1) + parseInt(hm2);

		} else if (parseInt(hm1) > parseInt(hm2)) {

			document.getElementById("adddata").disabled = true;

			Swal.fire('Nilai HM Akhir harus lebih besar dari HM Awal');
		} else if (parseInt(hm1) == parseInt(hm2)) {

			document.getElementById("adddata").disabled = true;

			Swal.fire('Nilai HM Akhir tidak boleh sama dari HM Awal');
		}

		if (!isNaN(result)) {
			document.getElementById('totaljam').value = result;
		}
	}

	function sumKM() {
		var km1 = document.getElementById('kmawal').value;
		var km2 = document.getElementById('kmakhir').value;

		var result = 0;

		if (parseInt(km1) < parseInt(km2)) {
			document.getElementById("adddata").disabled = false;
			result = parseInt(km1) +
				parseInt(km2);
		} else if (parseInt(km1) > parseInt(km2)) {

			document.getElementById("adddata").disabled = true;

			Swal.fire('Nilai KM Akhir harus lebih besar dari KM Awal');

		} else if (parseInt(km1) == parseInt(km2)) {

			document.getElementById("adddata").disabled = true;
			Swal.fire('Nilai KM Akhir tidak boleh sama dari KM Awal');
		}

		if (!isNaN(result)) {
			document.getElementById('totalkm').value = result;
		}
	}
</script>
<script>
	var dates = {
		convert: function (d) {
			return (
				d.constructor === Date ? d :
				d.constructor === Array ? new Date(d[0], d[1], d[2]) :
				d.constructor === Number ? new Date(d) :
				d.constructor === String ? new Date(d) :
				typeof d === "object" ? new Date(d.year, d.month, d.date) :
				NaN
			);
		},
		compare: function (a, b) {
			return (
				isFinite(a = this.convert(a).valueOf()) &&
				isFinite(b = this.convert(b).valueOf()) ?
				(a > b) - (a < b) :
				NaN
			);
		},
		inRange: function (d, start, end) {
			return (
				isFinite(d = this.convert(d).valueOf()) &&
				isFinite(start = this.convert(start).valueOf()) &&
				isFinite(end = this.convert(end).valueOf()) ?
				start <= d && d <= end :
				NaN
			);
		}
	}

	function validateDate(data) {
		var chooseDate = new Date(data);
		var currentDate = new Date();

		if (dates.compare(currentDate, chooseDate) < 0) {

			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Tidak boleh mengisi tanggal besok!',
				footer: ''
			})
			// alert("Tidak boleh mengisi tanggal kemarin");
			document.getElementById('adddata').disabled = true;
		} else {
			document.getElementById('adddata').disabled = false;
		}

	}
</script>
@endpush