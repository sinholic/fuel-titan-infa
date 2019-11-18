@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/timesheetstatus/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Timesheet Status</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Category</label>
						{{ Form::select('category', ['Working' => 'Working', 'Stand By' => 'Stand By', 'Break Down' => 'Break Down'], null, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
					</div>
					
					<div class="form-group">
						<label for="">Cause</label>
						{!! Form::text('status', old('statys'), ['class' => 'form-control', 'required']) !!}
					</div>

				</div>

				<div class="card-footer">

					<a href="/timesheetstatus" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection