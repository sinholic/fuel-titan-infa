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
						<label>Jenis Unit</label>
						<input type="text " name="jenis_unit" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Number</label>
                        <input type="text" name="unit_number" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Unit Category</label>
						<input type="text" name="unit_category" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Vendor</label>
						<input type="text" name="vendor" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Address</label>
						<input type="text" name="address" placeholder="" class="form-control" required autocomplete="">
                    </div> 

				</div>

				<div class="card-footer">

					<a href="/owner" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection