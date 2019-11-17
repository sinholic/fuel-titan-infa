@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/pengajuan/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Pengajuan Peminjaman Solar</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Supplier</label>
						<input type="text " name="supplier" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Qty</label>
                        <input type="text" name="qty" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Remark</label>
						<input type="text" name="remark" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>No SPK</label>
						<input type="text" name="no_spk" placeholder="" class="form-control" required autocomplete="">
					</div>
					
					<div class="form-group">
						<label>Peminjam</label>
						<input type="peminjam" name="peminjam" placeholder="" class="form-control" required autocomplete="">
                    </div>

                    <div class="form-group">
						<label>Stock Opname</label>
						<input type="stockopname" name="stockopname" placeholder="" class="form-control" required autocomplete="">
                    </div>

				</div>

				<div class="card-footer">

					<a href="/pengajuan" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection