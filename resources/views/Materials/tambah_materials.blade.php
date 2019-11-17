@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/materials/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Master Materials</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

                    <div class="form-group">
						<label>Materials</label>
						<input type="text" name="materials" placeholder="" class="form-control" required autofocus>
                    </div>
					
				</div>

				<div class="card-footer">

					<a href="/materials" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection