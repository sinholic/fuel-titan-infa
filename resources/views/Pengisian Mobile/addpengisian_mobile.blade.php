@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengisian_mobile/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengisian Solar On Mobile</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Id Driver</label>
						<input type="text" name="id_driver" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Equipment</label>
                        <input type="text" name="unit_equipment" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Qty Solar</label>
						<select class="form-control" name="prodi">
                            <option value="5 ltr">5 ltr</option>
                            <option value="10 ltr">10 ltr</option>
                            <option value="15 ltr">15 ltr</option>
                            <option value="20 ltr">20 ltr</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
						<label>Odometer</label>
						<input type="text" name="odometer" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Remark</label>
						<input type="text" name="remark" placeholder="" class="form-control" required autocomplete="">
					</div>

				</div>

				<div class="card-footer">

					<a href="/pengisian_mobile" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection