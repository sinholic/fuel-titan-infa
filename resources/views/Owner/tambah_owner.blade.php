@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/owner/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Owner</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama Perusahaan</label>
						<input type="text" name="vendor_name" value="{{ old('vendor_name')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Inisial Perusahaan</label>
						<input type="text" name="vendor_inisial" value="{{ old('vendor_inisial')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label for="">Alamat</label>
						<input type="text" name="address" value="{{ old('address')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Kategori</label>
						{{ Form::select('owner_category', ['Internal' => 'Internal', 'External' => 'External'], null, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
					</div>

					<div class="form-group">
						<label>PIC</label>
						<input type="text" name="pic" value="{{ old('pic')}}" placeholder="" class="form-control" required autofocus>
					</div>

					<div class="form-group">
						<label>Phone</label>
						<input type="number" name="phone" value="{{ old('phone')}}" placeholder="" class="form-control" required autocomplete="">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" value="{{ old('email')}}" placeholder="" class="form-control" required autocomplete="">
					</div>

				</div>

				<div class="card-footer">

					<a href="/owner" class="btn btn-default">Back</a>
					&nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection