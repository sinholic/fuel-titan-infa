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
						<label>User level</label>
						{{ Form::select('companycode_id', $companycodes, null, ['placeholder' => 'Pilih company...', 'required', 'class' => 'form-control']) }}
                    </div>

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="name" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>Email</label>
						<input type="email" name="email" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>IMEI</label>
						<input type="number" name="imei" placeholder="" class="form-control" required autofocus>
					</div>
					
					<div class="form-group">
						<label>IMEI 2</label>
						<input type="number" name="imei2" placeholder="" class="form-control" required autofocus>
                    </div>

					<div class="form-group">
						<label>User level</label>
						{{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pilih user level...', 'required', 'class' => 'form-control']) }}
					</div>

					{{ Form::hidden('password', \Str::random(10)) }}
					{{ Form::hidden('syncpassword', \Str::random(10)) }}
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