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


<a href="/tambah_consignment" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Consignment</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No PO</th>
                    <th class="text-center">Supplier</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Qty Diterima</th>
                    <th class="text-center">No Tangki</th>
                    <th class="text-center">Remark</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                @foreach($consignment ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <th>{{$s->no_po}}</th>
                    <th>{{$s->supplier}}</th>
                    <th>{{$s->qty}}</th>
                    <th>{{$s->qty_diterima}}</th>
                    <th>{{$s->no_tangki}}</th>
                    <th>{{$s->remark}}</th>

                    <td>
                        <div class="btn-group">

                            <a href="/consignment/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="return confirm('Yakin ingin menghapus data?')" href="/consignment/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
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
@endsection