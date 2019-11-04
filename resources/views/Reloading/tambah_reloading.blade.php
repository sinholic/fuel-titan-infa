@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/reloading/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengisian Ulang Mobile Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>No PO</label>
						<input type="text " name="no_po" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Mobile Station</label>
                        <input type="text" name="unit_mobile_station" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Driver Mobile Statis</label>
                        <input type="text" name="driver_mobile_statis" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Qty Solar</label>
						<input type="text" name="qty_solar" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Odometer</label>
						<input type="text" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>

				</div>

				<div class="card-footer">

					<a href="/reloading" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection