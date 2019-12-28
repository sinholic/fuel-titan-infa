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

<!-- <a href="/tambah_stockopname" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a> -->

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Stock Opname</h4>
        <!-- {!! Form::open(['url' => 'stockopname', 'class'=>'form-inline']) !!}
            {{ Form::token() }}
            {{-- <div class="row"> --}}
                <div class="form-group">
                    {!! Form::label('submit_date', 'Choose Date', []) !!}
                    {!! Form::date('submit_date', isset($submit_date) ? $submit_date : \Carbon\Carbon::yesterday()->toDateString(), ['class'=>'form-control mr-2 ml-2']) !!}
                </div>
                {!! Form::submit('Filter Stock Opname', ['class'=>'btn btn-default']) !!}
            {{-- </div> --}}
        {!! Form::close() !!} -->
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama barang</th>
                    <th class="text-center">Saldo akhir</th>
                    <th class="text-center">Saldo fisik</th>
                    <th class="text-center">Selisih</th>
                </tr>
            </thead>
            <tbody>
            @foreach($stockglobal ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <!-- <td>{{$s->kode_barang}}</td> -->
                    <td>{{isset($s->materials->materials) ? $s->materials->materials : ''}}</td>
                    <td>{{$s->saldo_akhir}}</td>
                    <td>{{$s->saldo_fisik}}</td>
                    <td>{{$s->selisih}}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<script>
    $('.delete').click(function () {
        var materials_id = $(this).attr('stockopname-id');
        var materials_nama = $(this).attr('stockopname-nama');
        swal({
                title: "Are you sure?",
                text: "Anda yakin akan menghapus material " + materials_nama + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/stockopname/" + materials_id + "/delete"
                }
            });
    });
</script>


@endsection