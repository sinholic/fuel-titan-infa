@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/userhe/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Timesheet Heavy Equipment</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					<div class="form-group">
						<label>No Alat</label>
						<input type="number " name="no_alat" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Tipe Alat</label>
                        <input type="text" name="tipe_alat" placeholder="" class="form-control" required autofocus>
                    </div>
					
					<div class="form-group">
						<label>Owner</label>
						<input type="text" name="penyewa" placeholder="" class="form-control" required autofocus>
					</div>
					
                    <div class="form-group">
						<label>Tanggal Operasi</label>
						<input type="date" name="tanggal_operasi" placeholder="" class="form-control" required autofocus>
					</div>
					
					<div class="form-group">
						<label>Area Kerja</label>
						<input type="text" name="nama_unit" placeholder="" class="form-control" required autofocus>
					</div>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>HM Awal</label>
								<input type="number" name="hm_awal" placeholder="" class="form-control" required autocomplete="">
							</div>
						</div>
					
						<div class="col-md-6">
							<div class="form-group">
								<label>KM Awal</label>
								<input type="number" name="km_awal" placeholder="" class="form-control" required autocomplete="">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
                            <div class="form-group">
                                <label>HM Akhir</label>
                                <input type="number" name="hm_akhir" placeholder="" class="form-control" required autocomplete="">
                            </div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label>KM Akhir</label>
								<input type="number" name="km_akhir" placeholder="" class="form-control" required autocomplete="">
                    		</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Total Jam</label>
								<input type="number" name="total_jam" placeholder="" class="form-control" required autocomplete="">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Total KM</label>
								<input type="number" name="km_total" placeholder="" class="form-control" required autocomplete="">
                    		</div>
						</div>
					</div>

					<div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Working</option>
                                    <option>Stand By</option>
                                    <option>Break Down</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
						<label>Job Order</label>
						<textarea name="job_order" class="form-control" rows="3" required autocomplete=""></textarea>
                    </div>

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>BBM</label>
								<input type="text" name="bbm" placeholder="" class="form-control" required autocomplete="">
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Operator</label>
								<input type="text" name="operator" placeholder="" class="form-control" required autocomplete="">
                    		</div>
						</div>
					</div>
                    
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Helper</label>
								<input type="text" name="helper" placeholder="" class="form-control" required autocomplete="">
                    		</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Pengawas</label>
								<input type="text" name="pengawas" placeholder="" class="form-control" required autocomplete="">
                    		</div>
						</div>
					</div>
					
				</div>

				<div class="card-footer">

					<a href="/userhe" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
					<input type="submit" value="Add Data" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection