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

<a href="/owner/export_excel" class="btn btn-success my-1" target="_blank">
    <i class="fas fa-file-excel"></i> Export Excel
</a> --}}

<a href="/owner/print_qr" class="btn btn-info" data-toggle="tooltip" title="Print"
    onclick="window.open('/owner/print_qr', 'newwindow', 'width=1000px, height=1000px'); return false;">
    <i class="fas fa-print"></i>
</a>

<a href="/tampiladdowner" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Master Owner Data</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Perusahaan</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">PIC</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                @foreach($owner ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->vendor_name}}</td>
                    <td>{{$s->address}}</td>
                    <td>{{$s->owner_category}}</td>
                    <td>{{$s->pic}}</td>
                    <td>{{$s->phone}}</td>
                    <td>{{$s->email}}</td>
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                            <a href="owner/detail/{{$s->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom"
                                title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a>

                            <a href="/owner/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip"
                                data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn btn-danger btn-sm delete" owner-id="{{$s->id}}">
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
        <form method="post" action="/owner/import_excel" enctype="multipart/form-data">
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
            var owner_id = $(this).attr('owner-id');
            swal({
            title: "Are you sure?",
            text: "Anda yakin akan menghapus data dengan id "+owner_id+ "?",
            icon: "warning",
            buttons: true,
            dangerMode: true, 
            })
            .then((willDelete) => {
                console.log(willDelete);
            if (willDelete) {
            window.location = "/owner/"+owner_id+"/delete"
            }
            });
        });
</script>
@endsection