@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/fuelman/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Fuelman</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>NIK</label>
						<input type="text" name="nik" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Location Assignment</label>
						<input type="text" name="location_assignment" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Password Login</label>
						<input type="text" name="password_login" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Password Sync</label>
						<input type="text" name="password_sync" placeholder="" class="form-control" required>
                    </div> 

                    <div class="form-group">
                        <label for="">IMEI</label>
                        <input type="text" name="imei" class="form-control" required autofocus>
                    </div>

				</div>

				<div class="card-footer">

					<a href="/fuelman" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection