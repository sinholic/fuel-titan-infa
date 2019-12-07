@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/userhe/update/{{$userhe->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Timesheet Heavy Equipment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>No Alat</label>
                        <input type="number" name="no_alat" value="{{$userhe->no_alat}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Tipe Alat</label>
                        <input type="text" name="tipe_alat" value="{{$userhe->tipe_alat}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        <input type="text" name="penyewa" value="{{$userhe->penyewa}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Operasi</label>
                        <input type="date" name="tanggal_operasi" value="{{$userhe->tanggal_operasi}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Area Kerja</label>
                        <input type="text" name="nama_unit" value="{{$userhe->areakerja}}" class="form-control" required autofocus>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>HM Awal</label>
                                <input type="number" id="hmawal" onkeyup="sum()"; name="hm_awal" value="{{$userhe->hm_awal}}" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KM Awal</label>
                                <input type="number" id="kmawal" onkeyup="sum()"; name="km_awal" value="{{$userhe->km_awal}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>HM Akhir</label>
                                <input type="number" id="hmakhir" onkeyup="sum()"; name="hm_akhir" value="{{$userhe->hm_akhir}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KM Akhir</label>
                                <input type="number" id="kmakhir" onkeyup="sum()"; name="km_akhir" value="{{$userhe->km_akhir}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Total Jam</label>
                                <input type="number" name="total_jam" value="{{$userhe->total_jam}}" class="form-control" readonly required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KM Total</label>
                                <input type="number" onkeyup="sum()"; name="km_total" value="{{$userhe->km_total}}" class="form-control" readonly required>
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
                        {{-- <input type="text" name="job_order" value="{{$userhe->job_order}}" class="form-control" required autofocus> --}}
                        <textarea name="job_order" class="form-control" rows="3" required autocomplete=""><?php echo htmlspecialchars($userhe->job_order); ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>BBM</label>
                                <input type="number" name="qty" value="{{$userhe->qty}}" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Operator</label>
                                <input type="text" name="operator" value="{{$userhe->operator}}" class="form-control" required autofocus>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label>Helper</label>
                                <input type="text" name="helper" value="{{$userhe->helper}}" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pengawas</label>
                                <input type="text" name="pengawas" value="{{$userhe->pengawas}}" class="form-control" readonly required autofocus>
                            </div> 
                        </div>
                    </div>
                </div>

                <div class="card-footer">

                    <a href="/userhe" class="btn btn-default">Back</a>
                    {{-- <input type="submit" value="Save" class="pull-right btn btn-warning"> --}}

                </div>

            </div>

        </form>

    </div>
</div>

<script>
	function sum(){
		var hm1 = document.getElementById('hmawal').value;
		var hm2 = document.getElementById('hmakhir').value;
		var km1 = document.getElementById('kmawal').value;
		var km2 = document.getElementById('kmakhir').value;
		var result = parseInt(hm1) + parseInt(hm2);
		var hasil = parseInt(km1) + parseInt(km2);
		if(!isNaN(result, hasil)){
			document.getElementById('totaljam').value = result,
			document.getElementById('totalkm').value = hasil;	
		}
	}
</script>

@endsection('content')