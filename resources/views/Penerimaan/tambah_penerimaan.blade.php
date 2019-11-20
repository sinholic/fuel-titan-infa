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
						<input id="purchase-order-choice" name="po_label" value="{{old('po_label')}}" class="form-control"
							required />
						<input type="hidden" id="purchase-order-choice-value" value="{{old('purchaseorder_id')}}" name="purchaseorder_id"
							class="form-control" required />

					</div>

					<div class="form-group">
						<label for="">Supplier</label>
						<input type="text" name="po_supplier" value="{{old('po_supplier')}}" placeholder="" class="supplier form-control" readonly autofocus>
					</div>

					<div class="form-group">
						<label>Qty</label>
						<input type="number" name="po_qty" value="{{old('po_qty')}}" placeholder="" class="qty form-control" readonly autofocus>
					</div>

					<div class="form-group">
						<label>Received Qty</label>
						<input type="number" value="{{old('qty')}}" name="qty" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Remark</label>
						<textarea name="remark" id="" cols="30" rows="5" class="form-control">{{old('remark')}}</textarea>
					</div>

					<div class="form-group">
						<label>No Tangki</label>
						{{ Form::select('fixstation_id', $fixstations, old('fixstation_id'), ['placeholder' => 'Pilih nomor tangki...', 'required', 'class' => 'form-control']) }}
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
	var local_source = {!! $purchaseorders-> toJson() !!};

	console.log(local_source);

	$('#purchase-order-choice').autocomplete({
		source: function (request, response) {
			response($.map(local_source, function (item, key) {
				return {
					id: item.id,
					value: item.purchaseorder_number,
					supplier: item.supplier,
					qty: item.amount
				}
			}))
		},
		select: function (event, ui) {
			// console.log(ui);
			$('#purchase-order-choice-value').val(ui.item.id);
			$('.supplier').val(ui.item.supplier);
			$('.qty').val(ui.item.qty);	
			// $('#purchase-order-choice').val(ui.item.label); // display the selected text
			// $('#purchase-order-choice_id').val(ui.item.value); // save selected id to hidden input
			return false;
		},
		change: function (event, ui) {
			console.log(ui);
			$("#purchase-order-choice-value").val(ui.item ? ui.item.id : 0);
		}
	});
</script>

@endpush