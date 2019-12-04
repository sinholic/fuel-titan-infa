@extends('master')
 
@section('content')

{{-- Notifikasi form validasi --}}
    @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('file')}}</strong>
        </span>
    @endif

    {{-- notifikasi sukses --}}
	@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<i class="icon fas fa-check"></i> {{ $sukses }}
		</div>
    @endif
    
    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#importExcel">
		 <i class="fas fa-file-excel"></i> Import Excel
    </button>

    <a href="/userhe/export_excel" class="btn btn-success my-1" target="_blank">
        <i class="fas fa-file-excel"></i> Export Excel
    </a>
    
        <a href="/tampiladduserhe" class="btn btn-primary">
            <i class="fa fa-plus nav-icon"></i>
        </a>

<div class="card" style="border-top: 3px solid #9C5C22">
        
       <div class="card-header">
            <h4>Timesheet Running Hour Machine</h4>
        </div>

    {{--  Ada dua nama yg diganti, area kerja (nama_unit) Owner (penyewa)--}}
    <div class="card-body">
        <table class="table table-striped table-bordered table-responsive" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No Alat</th>
                    <th class="text-center">Area Kerja</th>
                    <th class="text-center">Tanggal Operasi</th>
                    <th class="text-center">HM Awal</th>
                    <th class="text-center">HM Akhir</th>
                    <th class="text-center">Total Jam</th>
                    <th class="text-center">KM Awal</th>
                    <th class="text-center">KM Akhir</th>
                    <th class="text-center">KM Total</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Job Order</th>
                    <th class="text-center">BBM</th>
                    <th class="text-center">Helper</th>
                    <th class="text-center">Operator</th>
                    <th class="text-center">Pengawas</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                 @foreach($userhe ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->equipment->equipment_number ?? ''}}</td>
                    <td>{{ $s->areakerja }}</td>
                    <td>{{date('d-M-Y', strtotime($s->tanggal_operasi))}}</td>
                    <td>{{$s->hm_awal}}</td>
                    <td>{{$s->hm_akhir}}</td>
                    <td>{{ $s->hm_akhir - $s->hm_awal }}</td>
                    <td>{{$s->km_awal}}</td>
                    <td>{{$s->km_akhir}}</td>
                    <td>{{ $s->km_akhir - $s->km_awal }}</td>
                    <td>{{ $s->status->category .' - '.$s->status->status  }}</td>
                    <td>{{$s->job_order}}</td>
                    <td>{{$s->bbm}}</td>
                    <td>{{$s->helper}}</td>
                    <td>{{$s->operator}}</td>
                    <td>{{$s->userpengawas->name ?? ''}}</td>
                    
                    <td>
                         <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                             <a href="userhe/detail/{{$s->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a>

                            <a href="/userhe/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="/userhe/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
                                <i class="fa fa-trash nav-icon"></i>
                            </a>

                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

 <!-- Import Excel -->
		<div class="modal fade" id="importExcel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/equipment/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
			</div>
		</div>
@endsection