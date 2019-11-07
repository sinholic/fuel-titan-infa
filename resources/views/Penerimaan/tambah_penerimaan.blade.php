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
						<label>Remark</label>
						<input type="text " name="remark" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>No PO</label>
						<input type="text" name="no_po" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Qty</label>
						<input type="text" name="qty" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>No Tangki</label>
						<input type="text" name="no_tangki" placeholder="" class="form-control" required autocomplete="">
					</div>
					
				</div>

				<div class="card-footer">

					<a href="/penerimaan" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection