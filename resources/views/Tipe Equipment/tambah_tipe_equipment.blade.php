@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/tipe_equipment/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Tipe Equipment</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

                    <div class="form-group">
						<label>Merk</label>
						{{ Form::select('merk', $merk, null, ['placeholder' => 'Pilih merk...', 'required', 'class' => 'form-control'])}}
                    </div>

					<div class="form-group">
						<label>Tipe Equipment</label>
						<input type="text" name="tipe" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>Kelas Equipment</label>
						<input type="text" name="kelas" placeholder="" class="form-control" required autofocus>
                    </div>
					
				</div>

				<div class="card-footer">

					<a href="/tipe_equipment" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection