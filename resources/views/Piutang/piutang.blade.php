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

<a href="/tambah_piutang" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Piutang Solar</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">No Piutang</th>
                    <th class="text-center">Qty Piutang</th>
                    <th class="text-center">Peminjam</th>
                    <th class="text-center">Status Piutang</th>
                    <th class="text-center">Tgl Pengembalian</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                @foreach($piutang ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->no_piutang}}</td>
                    <td>{{$s->qty_piutang}}</td>
                    <td>{{$s->peminjam}}</td>
                    <td>{{$s->status_piutang}}</td>
                    <td>{{date('l, d-M-Y', strtotime($s->tgl_pengembalian))}}</td>
                    <td>
                        <div class="btn-group">

                            <a href="/piutang/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn btn-danger btn-sm delete" piutang-id="{{$s->id}}">
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
    $('.delete').click(function() {
        var piutang_id = $(this).attr('piutang-id');
        swal({
                title: "Are you sure?",
                text: "Anda yakin akan menghapus data ini?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/piutang/" + piutang_id + "/delete"
                }
            });
    });
</script>


@endsection