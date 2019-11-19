@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/penerimaan/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Penerimaan Solar</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>No PO</label>
						<input list="purchase-order-lists" id="purchase-order-choice" name="no_po"  class="form-control" required />

						<datalist id="purchase-order-lists">
							@foreach ($purchaseorders as $purchaseorder)
							<option data-qty="{{ $purchaseorder->amount }}"
								data-supplier="{{ $purchaseorder->supplier }}"
								data-id="{{ $purchaseorder->id }}"
								value="{{ $purchaseorder->purchaseorder_number }}">
								{{ $purchaseorder->purchaseorder_number }}</option>
							@endforeach
						</datalist>
					</div>

					<div class="form-group">
						<label for="">Supplier</label>
						<input type="text" name="supplier" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Qty</label>
						<input type="text" name="qty" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Received Qty</label>
						<input type="text" name="received_qty" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Remark</label>
						<textarea name="remark" id="" cols="30" rows="10" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label>No Tangki</label>
						{{ Form::select('no_tangki', $fixstations, null, ['placeholder' => 'Pilih nomor tangki...', 'required', 'class' => 'form-control']) }}
					</div>

				</div>

				<div class="card-footer">

					<a href="/penerimaan" class="btn btn-default">Back</a>
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
	$("#purchase-order-choice").focusout(function () {
		alert($(this).val());
	});
</script>

@endpush