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

    <a href="/unitdata/export_excel" class="btn btn-success my-1" target="_blank">Export Excel</a>
    
        <a href="/tampiladdunitdata" class="btn btn-primary">
            <i class="fa fa-plus nav-icon"></i>
        </a>

<div class="card" style="border-top: 3px solid #9C5C22">

        <div class="card-header">
            <h4>Master Unit Data</h4>
        </div>

    <div class="card-body">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Unit Number</th>
                    <th class="text-center">Unit Category</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Fuel Capacity</th>
                    <th class="text-center" width="5%">Std Consumption</th>
                    <th class="text-center">Last Ending Stock</th>
                    <th class="text-center">Additional Fuel </th>
                    <th class="text-center">Last Maintenance</th>
                    <th class="text-center">PIC</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                @foreach($unitdata ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->unit_number}}</td>
                    <td>{{$s->unit_category}}</td>
                    <td>{{$s->location}}</td>
                    <td>{{$s->fuel_capacity}}</td>
                    <td>{{$s->std_consumption}}</td>
                    <td>{{$s->last_ending_stock}}</td>
                    <td>{{$s->add_fuel}}</td>
                    <td>{{$s->last_maintenance}}</td>
                    <td>{{$s->pic}}</td>
                    <td>
                         <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                             <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a>

                            <a href="/unitdata/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="/unitdata/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
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
				<form method="post" action="/unitdata/import_excel" enctype="multipart/form-data">
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