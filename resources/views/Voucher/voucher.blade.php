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

{{-- Menampilkan error validasi --}}
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error}}</li>
        @endforeach
    </ul>
</div>
@endif

<a href="/tampiladdvoucher" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Master Voucher</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-responsive table table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Jumlah Voucher</th>
                    <th class="text-center">Qty (ltr)</th>
                    <th class="text-center">Owner</th>
                    <th class="text-center">Expired Date</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($voucher ?? '' as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <a href="#"
                            onclick="window.open('/voucher/lists/{{$s->id}}', 'newwindow', 'width=1000px, height=1000px'); return false;">
                            {{$s->vouchercodes->count()}}
                        </a>
                    </td>
                    <td>{{$s->qty}}</td>
                    <td>{{$s->voucherowner->vendor_name ?? 'Owner not found'}}</td>
                    <td>{{date('l, d-M-Y', strtotime($s->expired_date))}}</td>
                    <td>
                        <div class="btn-group">

                            <!-- URL::to('/admin/category/detail.id='.$cate-id -->
                            <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" title="Print"
                                onclick="window.open('/voucher/print/{{$s->id}}', 'newwindow', 'width=1000px, height=1000px'); return false;">
                                <i class="fas fa-print"></i>
                            </a>

                            <a href="/voucher/edit/{{$s->id}}" class="btn btn-warning  btn-sm"
                                data-toggle="tooltip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn btn-danger btn-sm delete" voucher-id="{{$s->id}}">
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

<script>
    $('.delete').click(function(){
        var voucher_id = $(this).attr('voucher-id');
        swal({
        title: "Are you sure?",
        text: "Anda yakin akan menghapus voucher ini?",
        icon: "warning",
        buttons: true,
        dangerMode: true, 
        })
        .then((willDelete) => { 
            console.log(willDelete);
        if (willDelete) {
           window.location = "/voucher/"+voucher_id+"/delete"
        }
        });
    });
</script>

@endsection