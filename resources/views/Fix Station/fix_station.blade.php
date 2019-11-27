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

<a href="/fix/export_excel" class="btn btn-success my-1" target="_blank">
    <i class="fas fa-file-excel"></i> Export Excel
</a>

<a href="/tampiladdfix" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Master Fix Station</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Nama Station</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Nama Lokasi</th>
                    <th class="text-center">Koordinat GPS</th>
                    <th class="text-center">Total Tangki</th>
                    <th class="text-center">Total Kapasitas Tangki</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fix ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->company->company_name ?? ''}}</td>
                    <td>{{$s->name_station}}</td>
                    <td>{{$s->address}}</td>
                    <td>{{$s->nama_lokasi}}</td>
                    <td>{{$s->koordinat_gps}}</td>
                    <td>{{$s->total_tank}}</td>
                    <td>{{$s->total_fuel_capacity}}</td>
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                            <a href="/fix/detail/{{$s->id}}" class="btn btn-info btn-sm" data-toggle="tooltip"
                                data-placement="bottom" title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a>

                            <a href="/fix/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn btn-danger btn-sm delete" fix-station-id="{{$s->id}}">
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

<script>
    $('.delete').click(function () {
        var fix_station_id = $(this).attr('fix-station-id');
        swal({
                title: "Are you sure?",
                text: "Anda yakin akan menghapus data dengan id " + fix_station_id + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/fix/" + fix_station_id + "/delete"
                }
            });
    });
</script>
@endsection