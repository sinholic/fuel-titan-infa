@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/unitdata/create" method="POST">

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
						<label>Unit Number</label>
						<input type="text" name="unit_number" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Category</label>
                        <input type="text" name="unit_category" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Location</label>
						<input type="text" name="location" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Fuel Capacity</label>
						<input type="text" name="fuel_capacity" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Std Consumption</label>
						<input type="text" name="std_consumption" placeholder="" class="form-control" required autocomplete="">
                    </div>
                    
                    <div class="form-group">
						<label>Last Ending Stock</label>
						<input type="text" name="last_ending_stock" placeholder="" class="form-control" required autocomplete>
                    </div>

                    <div class="form-group">
                        <label for="">Additional Fuel</label>
                        <input type="text" class="form-control" name="add_fuel">
                    </div>

                    <div class="form-group">
                        <label for="">Last Maintenance</label>
                        <input type="text" class="form-control" name="last_maintenance">
                    </div>

                    <div class="form-group">
                        <label for="">PIC</label>
                        <input type="text" class="form-control" name="pic">
                    </div>
                     

				</div>

				<div class="card-footer">

					<a href="/unitdata" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection