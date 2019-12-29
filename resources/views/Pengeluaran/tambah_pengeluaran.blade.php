@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengeluaran/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengeluaran Solar</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>No Pengajuan Piutang</label>
						{!! Form::select('pengajuan_id', $pengajuanss, old('pengajuan_id'), ['class'=>'form-control set-to-select2', 'placeholder'=>'Pilih nomor pengajuan']) !!}
					</div>

					<div class="form-group">
						<label>Qty</label>
						<input type="number" value="{{old('qty')}}" name="qty" placeholder="" class="form-control qty" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Pengeluaran Solar</label>
                        <input type="date" value="{{old('transaction_date')}}" name="transaction_date" placeholder="" class="form-control" required autofocus>
					</div>
					{!! Form::hidden('type', 'P') !!}
					{!! Form::hidden('transaction_type', 'Out') !!}
				</div>

				<div class="card-footer">

					<a href="/pengeluaran" class="btn btn-default">Back</a>
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
		
	</script>
@endpush