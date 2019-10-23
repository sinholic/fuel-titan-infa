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
			<strong>{{ $sukses }}</strong>
		</div>
    @endif
    
    <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#importExcel">
			Import Excel
    </button>

    <a href="/station/export_excel" class="btn btn-success my-1" target="_blank">Export Excel</a>
    
        <a href="/tampiladdstation" class="btn btn-primary">
            <i class="fa fa-plus nav-icon"></i>
        </a>

<div class="card" style="border-top: 3px solid #9C5C22">
    <div class="card-header">
        Master Station
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Name Station</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Koordinat GPS</th>
                    <th class="text-center">Tank Number</th>
                    <th class="text-center" width="5%">Fuel Capacity</th>
                    <th class="text-center">Fuelman Assignment</th>
                    <th class="text-center">Last Re-Fuel</th>
                    <th class="text-center">Ending Stock Date</th>
                    <th class="text-center">Ending Stock Quantity</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @foreach($station as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->nama_lokasi}}</td>
                    <td>{{$s->address}}</td>
                    <td>{{$s->koordinat_gps}}</td>
                    <td>{{$s->tank_number}}</td>
                    <td>{{$s->fuel_capacity}}</td>
                    <td>{{$s->fuel_assignment}}</td>
                    <td>{{$s->last_refuel}}</td>
                    <td>{{$s->ending_stock_date}}</td>
                    <td>{{$s->ending_stock_quantity}}</td>
                    <td>
                         <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                             <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a>

                            <a href="/station/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="/station/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
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
				<form method="post" action="/station/import_excel" enctype="multipart/form-data">
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

{{-- @push('scripts')
<script>
    $(function()
    {
        $('#station1').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/station/json',
            columns: [
                { data: 'id', name: 'id', 'visible': false},
                { data: 'nama_lokasi', name: 'nama_lokasi'},
                { data: 'address', name: 'address'},
                { data: 'koordinat_gps', name: 'koordinat_gps'},
                { data: 'tank_number', name: 'tank_number'},
                { data: 'fuel_capacity', name: 'fuel_capacity'},
                { data: 'fuel_assignment', name: 'fuel_assignment'},
                { data: 'last_refuel', name: 'last_refuel'},
                { data: 'ending_stock_date', name: 'ending_stock_date'},
                { data: 'ending_stock_quantity', name: 'ending_stock_quantity'}
            ]
        });
    });
</script>
@endpush --}}