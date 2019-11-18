@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/fix/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Fix Station</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>Nama Company</label>
						{{ Form::select('companycode_id', $companycodes, null, ['placeholder' => 'Pilih company...', 'required', 'class' => 'form-control']) }}
                    </div>

					<div class="form-group">
						<label>Nama Station</label>
						<input type="text " name="name_station" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Nama Lokasi</label>
						<input type="text" name="nama_lokasi" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Koordinat GPS</label>
						<input type="text" name="koordinat_gps" placeholder="" class="form-control" required autofocus>
					</div>
					
					<div id="tanks">
						<div id="tank">
							<div class="form-group">
								<label>Tank Number</label>
								<input type="text" name="tank_number[]" placeholder="" class="form-control" required autocomplete="">
							</div> 

							<div class="form-group">
								<label>Tank Capacity</label>
								<div class="input-group">
									<input type="number" name="fuel_capacity[]" placeholder="" class="form-control" required autocomplete="">
									<div class="input-group-btn">
										<button id="addtank" class="btn btn-success" type="button">
											<i class="fa fa-plus"></i>
										</button>
									</div>
								</div>
							</div>

							<div class="form-"></div>
						</div>
					</div> 

				</div>

				<div class="card-footer">

					<a href="/fix" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>

@endsection

@push('scripts')
	<script>
		
		$('#addtank').click(function () {
			console.log("HAI");
			
      		var tank = $('#tank');
      		var clone = $('#tank').clone();
			clone.find('.btn').remove();
			clone.appendTo("#tanks");
    	})
	</script>
@endpush

