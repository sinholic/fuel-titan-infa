@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/user/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah User</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif


					<div class="form-group">
						<label>Company Name</label>
						{{ Form::select('companycode_id', $companycodes, null, ['placeholder' => 'Pilih company...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" value="{{ old('name')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>Sync Password</label>
						<input type="password" name="syncpassword" placeholder="" class="form-control">
					</div>

					<div class="form-group">
						<label>IMEI</label>
						<input type="number" name="imei" value="{{ old('imei')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>IMEI 2</label>
						<input type="number" name="imei2" value="{{ old('imei2')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>User level</label>
						{{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pilih user level...', 'required', 'class' => 'form-control']) }}
					</div>


					<div class="form-group">
						<!-- <label>Password</label>
						{{ Form::input('password', null, 'required', ['class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>Sync Password</label>
						{{ Form::input('syncpassword', null, 'required', ['class' => 'form-control']) }}
					</div> -->


					</div>

					<div class="card-footer">

						<a href="/user" class="btn btn-default">Back</a>
						&nbsp;&nbsp;
						<input type="submit" value="Save" class="pull-right btn btn-primary">

					</div>

				</div>

		</form>

	</div>
</div>



@endsection