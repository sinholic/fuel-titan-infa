@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengajuan_piutang/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengajuan Piutang Solar</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('<br/>', $errors->all(':message'))}}
					</div>
					@endif


					<div class="form-group">
                        <label>No Pengajuan Piutang</label>
                        {{-- readonly value="{{$spkNumber}}" --}}
						<input type="text" name="no_pengajuan" placeholder="" class="form-control">
					</div>

					{{-- <div class="form-group">
						<label>Supplier</label>
						{!! Form::select('supcompanycode_id', $companycodes, old('supcompanycode_id'), ['placeholder'=>'Choose a company', 'class'=>'form-control set-to-select2']) !!}
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="Supplier"></label>
                        <input type="text" name="supcompanycode_id" placeholder="" class="form-control">
                    </div>

					<div class="form-group">
						<label>Lokasi pengeluaran</label>
						{!! Form::select('fixstation_id', $fixstations, old('fixstation_id'), ['placeholder'=>'Choose a location','class'=>'form-control set-to-select2']) !!}
					</div>

					<div class="form-group">
						<label>Tanggal pengeluaran</label>
						<input type="date" name="taking_date" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label for="">Qty</label>
						<input type="number" name="qty" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Remark</label>
						<input type="text" name="remark" placeholder="" class="form-control" required autofocus>
					</div>

                    <div class="form-group">
                        <label for="">Peminjam</label>
                        <input type="text" name="peminjam" placeholder="" class="form-control">
                    </div>

					{{-- <div class="form-group">
						<label>Peminjam</label>
						<input type="text" name="peminjam" placeholder="" class="form-control" readonly value="{{\Auth::user()->companycode->company_name}}">
						{!! Form::hidden('borcompanycode_id', \Auth::user()->companycode->id) !!}
					</div> --}}

				</div>

				<div class="card-footer">

					<a href="/pengajuan_piutang" class="btn btn-default">Back</a>
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
	var dates = {
		convert: function(d) {
			return (
				d.constructor === Date ? d :
				d.constructor === Array ? new Date(d[0], d[1], d[2]) :
				d.constructor === Number ? new Date(d) :
				d.constructor === String ? new Date(d) :
				typeof d === "object" ? new Date(d.year, d.month, d.date) :
				NaN
			);
		},
		compare: function(a, b) {
			return (
				isFinite(a = this.convert(a).valueOf()) &&
				isFinite(b = this.convert(b).valueOf()) ?
				(a > b) - (a < b) :
				NaN
			);
		},
		inRange: function(d, start, end) {
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

		if (dates.compare(currentDate, chooseDate) > -1) {

			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: 'Tidak boleh mengisi tanggal kemarin!',
				footer: ''
			})
			// alert("Tidak boleh mengisi tanggal kemarin");
			document.getElementById('btnSave').disabled = true;
		} else {
			document.getElementById('btnSave').disabled = false;
		}

	}
</script>
@endpush