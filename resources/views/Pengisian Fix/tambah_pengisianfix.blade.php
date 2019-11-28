@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengisian_fix/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Add Good Issue On Fix Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
                        <label for="">Unit Equipment</label>
                        <input type="text" name="unit_equipment" placeholder="" class="form-control" required autofocus>
                    </div>

					<div class="form-group">
						<label>Id Driver</label>
						<input type="number" name="id_driver" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Qty Solar</label>
						<input type="number" name="qty_solar" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Odometer</label>
						<input type="number" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Remark</label>
						<input type="text" name="remark" placeholder="" class="form-control" required autocomplete="">
					</div>

				</div>

				<div class="card-footer">

					<a href="/pengisian_fix" class="btn btn-default">Back</a>
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
		$('#company-code').autocomplete({
            source: function (request, response) {
                response($.map(local_source, function (item, key) {

                    var company_name = item.company_name.toUpperCase();

                    if (company_name.indexOf(request.term.toUpperCase()) != -1) {
                        return {
                            id: item.id,
                            value: item.company_name,
                            inisial: item.company_inisial
                        }
                    } else {
                        return null;
                    }
                }))
            },
            select: function (event, ui) {
                $('.nama-lokasi').show();
                $('#company-code-value').val(ui.item.id);
                $('.inisial').html(ui.item.inisial.substr(0, 2));
                return false;
            },
            change: function (event, ui) {
                console.log(ui);
                $("#company-code-value").val(ui.item ? ui.item.id : 0);
            }
        });
	</script>

@endpush