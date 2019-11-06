@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/fix/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Fix Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama Station</label>
						<input type="text " name="name_station" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Nama Lokasi</label>
						<input type="text" name="nama_lokasi" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Koordinat GPS</label>
						<input type="text" name="koordinat_gps" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Total Tank</label>
						<input type="text" name="tank_number" placeholder="" class="form-control" required autocomplete="">
                    </div> 

                    <div class="form-group">
						<label>Kapasitas Tangki</label>
						<input type="number" name="fuel_capacity" placeholder="" class="form-control" required autocomplete="">
                    </div> 

                    <div class="form-group">
						<label>Fuel Assignment</label>
						<input type="text" name="fuel_assignment" placeholder="" class="form-control" required autocomplete="">
                    </div> 

                    <div class="form-group">
						<label>Pengisian Terakhir</label>
						<input type="date" name="last_refuel" placeholder="" class="form-control" required autocomplete="">
                    </div> 

                    <div class="form-group">
						<label>Ending Stock Date</label>
						<input type="date" name="ending_stock_date" placeholder="" class="form-control" required autocomplete="">
                    </div> 

                    <div class="form-group">
						<label>Ending Stock Quantity</label>
						<input type="number" name="ending_stock_quantity" placeholder="" class="form-control" required autocomplete="">
                    </div> 

				</div>

				<div class="card-footer">

					<a href="/fix" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection