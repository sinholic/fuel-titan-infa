@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/station/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama Station</label>
						<input type="text" name="nama_lokasi" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Koordinat GPS</label>
						<input type="text" name="koordinat_gps" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Tank Number</label>
						<input type="text" name="tank_number" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Fuel Capacity</label>
						<input type="text" name="fuel_capacity" placeholder="" class="form-control" required autocomplete="">
                    </div>
                    
                    <div class="form-group">
						<label>Fuelman Assignment</label>
						<input type="text" name="fuel_assignment" placeholder="" class="form-control" required autocomplete>
                    </div>

                    <div class="form-group">
                        <label for="">Last Re-Fuel</label>
                        <input type="text" class="form-control" name="last_refuel">
                    </div>

                    <div class="form-group">
                        <label for="">Ending Stock Date</label>
                        <input type="text" class="form-control" name="ending_stock_date">
                    </div>

                    <div class="form-group">
                        <label for="">Ending Stock Quantity</label>
                        <input type="text" class="form-control" name="ending_stock_quantity">
                    </div>
                     

				</div>

				<div class="card-footer">

					<a href="/station" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection