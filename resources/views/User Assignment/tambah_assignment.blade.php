@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/userassign/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah User Assignment</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama</label>
						{{ Form::select('user_id', $users, null, ['placeholder' => 'Pilih nama...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
						<label>ID Station</label>
						<input type="number" name="station_id" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>Mobile</label>
						<input type="number" name="mobile" placeholder="" class="form-control" required autofocus>
                    </div>

					<div class="form-group">
						<label>Start Date</label>
						<input type="date" name="start_date" placeholder="" class="form-control" required autofocus>
					</div>
					
					<div class="form-group">
						<label>End Date</label>
						<input type="date" name="end_date" placeholder="" class="form-control" required autofocus>
                    </div>

				</div>

				<div class="card-footer">

					<a href="/user_assign" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection