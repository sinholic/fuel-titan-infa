@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/voucher/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Voucher</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					{{-- <div class="form-group">
						<label>Code Voucher</label>
						<input type="text " name="code_number" placeholder="" class="form-control" required autofocus>
                    </div> --}}

                    <div class="form-group">
                        <label for="">Quantity Liter</label>
                        <input type="number" name="qty" placeholder="Jumlah Liter" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Owner</label>
						<input type="text" name="owner" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Expired Date</label>
						<input type="date" name="expired_date" placeholder="" class="form-control" required autofocus>
                    </div>

				</div>

				<div class="card-footer">

					<a href="/voucher" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection