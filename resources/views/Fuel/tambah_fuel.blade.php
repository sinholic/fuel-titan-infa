@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/fuel/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Penerimaan Fuel</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Quantity</label>
						<input type="text" name="quantity" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="text" name="amount" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Vendor</label>
						<input type="text" name="vendor" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Fuel Station</label>
						<input type="text" name="fuel" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Tank Number</label>
						<input type="text" name="tank_number" placeholder="" class="form-control" required>
                    </div> 

                    <div class="form-group">
                        <label for="">Invoice Number</label>
                        <input type="text" name="invoice_number" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Document Date</label>
                        <input type="date" name="document_date" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Posting Date</label>
                        <input type="date" name="posting_date" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Driver Name</label>
                        <input type="text" name="driver_name" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Recipient</label>
                        <input type="text" name="recipient" class="form-control" required autofocus>
                    </div>
				</div>

				<div class="card-footer">

					<a href="/fuel" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection