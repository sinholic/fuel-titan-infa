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

<a href="/pengajuan/export_excel" class="btn btn-success my-1" target="_blank">
    <i class="fas fa-file-excel"></i> Export Excel
</a>

<a href="/tambahpengajuan" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Pengajuan Hutang Solar</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No SPK</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Remark</th>
                    <th class="text-center">Peminjam</th>
                    <th class="text-center">Status Peminjaman</th>
                    {{-- <th class="text-center">StockOpname</th> --}}
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->no_spk}}</td>
                    <td>{{$s->supplier}}</td>
                    <td>{{$s->qty}}</td>
                    <td>{{$s->remark}}</td>
                    <td>{{$s->peminjam}}</td>
                    <td>{{($s->approved == NULL ? 'Not yet approved' : ($s->approved ? 'Approved' : 'Rejected'))}}</td>
                    {{-- <td>{{$s->stockopname}}</td> --}}
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                            {{-- <a href="/pengajuan/detail/{{$s->id}}" class="btn btn-info btn-sm" data-toggle="tooltip"
                                data-placement="bottom" title="Info">
                                <i class="fa fa-info-circle nav-icon"></i>
                            </a> --}}

                            @if ($s->approved == NULL)
                            <a onClick="return confirm('Yakin ingin menyetujui peminjaman ini?')"
                                href="/pengajuan/{{$s->id}}/approve" class="btn btn btn-success btn-sm">
                                <i class="fa fa-check nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin mereject peminjaman ini?')"
                                href="/pengajuan/{{$s->id}}/reject" class="btn btn btn-danger btn-sm">
                                <i class="fa fa-times nav-icon"></i>
                            </a>
                            @endif

                            {{-- <a href="/pengajuan/edit/{{$s->id}}" class="btn btn-warning btn-sm"
                            data-toggle="tootip"
                            data-placement="bottom" title="Edit">
                            <i class="fa fa-edit nav-icon"></i>
                            </a> --}}

                            {{-- <a onClick="return confirm('Yakin ingin menghapus data?')"
                                href="/pengajuan/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
                            <i class="fa fa-trash nav-icon"></i>
                            </a> --}}

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
        <form method="post" action="/pengajuan/import_excel" enctype="multipart/form-data">
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