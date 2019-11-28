@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengambilan/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengambilan Solar</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>No Pengajuan Hutang</label>
						<input id="debt-choice" name="debt_label" value="{{old('debt_label')}}" class="form-control"
							required />
						<input type="hidden" id="debt-choice-value" value="{{old('credit_id')}}" name="credit_id"
							class="form-control" required />
					</div>

					<div class="form-group">
						<label>Qty</label>
						<input type="number" value="{{old('qty')}}" name="qty" placeholder="" class="form-control qty" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Pengambilan Solar</label>
                        <input type="date" value="{{old('date')}}" name="date" placeholder="" class="form-control" required autofocus>
                    </div>
              
				</div>

				<div class="card-footer">

					<a href="/pengambilan" class="btn btn-default">Back</a>
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
		var local_source = {!! $pengajuans->toJson() !!};
	
		console.log(local_source);
	
		$('#debt-choice').autocomplete({
			source: function (request, response) {
				response($.map(local_source, function (item, key) {
					
					var no_spk = item.no_spk.toUpperCase();
					
					if (no_spk.indexOf(request.term.toUpperCase()) != -1) {	
						return {
							id: item.id,
							value: item.no_spk,
							supplier: item.supplier,
							qty: item.qty
						}
					}else{
						return null;
					}
				}))
			},
			select: function (event, ui) {
				// console.log(ui);
				$('#debt-choice').val(ui.item.value);
				$('#debt-choice-value').val(ui.item.id);
				$('.supplier').val(ui.item.supplier);
				$('.qty').val(ui.item.qty);	
				// $('#debt-choice').val(ui.item.label); // display the selected text
				// $('#debt-choice_id').val(ui.item.value); // save selected id to hidden input
				return false;
			},
			change: function (event, ui) {
				console.log(ui);
				$("#debt-choice-value").val(ui.item ? ui.item.id : 0);
			}
		});
	</script>
@endpush