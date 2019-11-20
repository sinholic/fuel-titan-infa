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
						<label>Equipment Number</label>
						<input id="equipment-number" class="form-control"
							required />
						<input type="hidden" id="equipment-number-value" name="purchaseorder_d"
							class="form-control" required />
						{{ Form::select('equipment_id', $equipments, null, ['placeholder' => 'Pilih equipment...', 'required', 'class' => 'form-control set-to-select2']) }}
					</div>

					<div class="form-group">
						<label for="">Tipe Alat</label>
						<input type="text" name="tipe_alat" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Owner</label>
						<input type="text" name="penyewa" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Area Kerja</label>
						<input type="text" name="nama_unit" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Tanggal Operasi</label>
								<input type="date" onchange="validateDate(this.value)" name="tanggal_operasi" placeholder="" class="form-control" required autofocus>
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
						<label>Job Order</label>
						<textarea name="job_order" class="form-control" rows="3" required autocomplete=""></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>BBM</label>
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
								<input type="text" name="pengawas" placeholder="" class="form-control" required
									autocomplete="">
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
    convert:function(d) {
        return (
            d.constructor === Date ? d :
            d.constructor === Array ? new Date(d[0],d[1],d[2]) :
            d.constructor === Number ? new Date(d) :
            d.constructor === String ? new Date(d) :
            typeof d === "object" ? new Date(d.year,d.month,d.date) :
            NaN
        );
    },
    compare:function(a,b) {
        return (
            isFinite(a=this.convert(a).valueOf()) &&
            isFinite(b=this.convert(b).valueOf()) ?
            (a>b)-(a<b) :
            NaN
        );
    },
    inRange:function(d,start,end) {
       return (
            isFinite(d=this.convert(d).valueOf()) &&
            isFinite(start=this.convert(start).valueOf()) &&
            isFinite(end=this.convert(end).valueOf()) ?
            start <= d && d <= end :
            NaN
        );
    }
}

function validateDate(data) {
var chooseDate = new Date(data);
var currentDate = new Date();

if(dates.compare(currentDate,chooseDate) < 0) {
 
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