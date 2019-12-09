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

{{-- <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#importExcel">
    <i class="fas fa-file-excel"></i> Import Excel
</button>

<a href="/equipment/export_excel" class="btn btn-success my-1" target="_blank">
    <i class="fas fa-file-excel"></i> Export Excel
</a> --}}

<a href="/equipment/print_qr" class="btn btn-info" data-toggle="tooltip" title="Print" onclick="window.open('/equipment/print_qr', 'newwindow', 'width=1000px, height=1000px'); return false;">
    <i class="fas fa-print"></i>
</a>

<a href="/tampiladdequipment" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Master Equipment</h4>
    </div>

    <div class="card-body">
        <table class="table table-hover table-responsive table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nomor Equipment</th>
                    <th class="text-center">No. Equipment SAP</th>
                    <th class="text-center">Nama Equipment</th>
                    <th class="text-center">Equipment Category</th>
                    <th class="text-center">Status Kendaraan</th>
                    {{-- <th class="text-center">Location</th> --}}
                    <th class="text-center">Fuel Capacity</th>
                    <th class="text-center">PIC</th>
                    {{-- <th class="text-center">Card Number</th> --}}
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                @foreach($equipment ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->equipment_number}}</td>
                    <td>{{$s->equipment_number_sap}}</td>
                    <td>{{$s->equipment_name}}</td>
                    <td>{{$s->equipmentcategory->nama ?? ''}}</td>
                    <td>{{$s->status_vehicle}}</td>
                    {{-- <td>{{$s->location}}</td> --}}
                    <td>{{$s->fuel_capacity}}</td>
                    <td>{{$s->equipmentowner->vendor_name ?? ''}}</td>
                    {{-- <td>{{$s->cards->last()->cardnumber ?? ''}}</td> --}}
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                            {{-- <a href="#" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a> --}}
                            @if ($s->cards->count() < 2)
                                <a 
                                    onClick="return confirm('Yakin ingin membuat ulang kartu equipment?')"
                                    href="/equipment/generate-card/{{ $s->id }}" 
                                    class="btn btn-info btn-sm" 
                                    data-toggle="tooltip" 
                                    data-placement="bottom"
                                    title="Info">
                                    <i class="fa fa-sync nav-icon"></i>
                                </a>
                            @else
                                <button disabled class="btn btn-secondary btn-sm btn-disabled"><i class="fa fa-sync nav-icon"></i></button>
                            @endif

                             <a href="/equipment/detail/{{$s->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a>

                            <a href="/equipment/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn btn-danger btn-sm delete" equipment-id="{{$s->id}}">
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
{{-- <div class="modal fade" id="importExcel" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</div> --}}

<script>
        $('.delete').click(function(){
            var equipment_id = $(this).attr('equipment-id');
            swal({
            title: "Are you sure?",
            text: "Anda yakin akan menghapus data dengan id "+equipment_id+ "?",
            icon: "warning",
            buttons: true,
            dangerMode: true, 
            })
            .then((willDelete) => {
                console.log(willDelete);
            if (willDelete) {
            window.location = "/equipment/"+equipment_id+"/delete"
            }
            });
        });
</script>

@endsection