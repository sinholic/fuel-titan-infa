@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/purchase/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Purchase Order</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
                        <label for="">PO Number</label>
                        <input type="text" name="purchaseorder_number" placeholder="" class="form-control" required autofocus>
                    </div>

					<div class="form-group">
						<label>PO Date</label>
						<input type="date" name="tanggal_purchaseorder" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Supplier</label>
						<input type="text" name="supplier" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Qty</label>
						<input type="number" name="amount" placeholder="" class="form-control" required autofocus>
                    </div>
                    
				</div>

				<div class="card-footer">

					<a href="/add_purchase" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection