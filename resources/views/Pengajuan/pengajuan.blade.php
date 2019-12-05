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
                    <th class="text-center">No Pengajuan Hutang</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Lokasi Pengambilan</th>
                    <th class="text-center">Tanggal Pengambilan</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Remark</th>
                    <th class="text-center">Peminjam</th>
                    <th class="text-center">Status Peminjaman</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->no_pengajuan}}</td>
                    <td>{{$s->supplier->company_name}}</td>
                    <td>{{ $s->fixstation->nama_lokasi }}</td>
                    <td>{{$s->taking_date}}</td>
                    <td>{{$s->qty}}</td>
                    <td>{{$s->remark}}</td>
                    <td>{{$s->borrower->company_name}}</td>
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
                            <a onClick="return confirm('Yakin ingin menyetujui peminjaman ini?')" href="/pengajuan/{{$s->id}}/approve" class="btn btn btn-success btn-sm">
                                <i class="fa fa-check nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin mereject peminjaman ini?')" href="/pengajuan/{{$s->id}}/reject" class="btn btn btn-danger btn-sm">
                                <i class="fa fa-times nav-icon"></i>
                            </a>

                            @else
                            <a href="/bukticetak" class="btn btn-info btn-sm" data-toggle="tooltip" title="Print" onclick="window.open('/bukticetak', 'newwindow', 'width=1000px, height=1000px'); return false;">
                                Cetak
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

@endsection