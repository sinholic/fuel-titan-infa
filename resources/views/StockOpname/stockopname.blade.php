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

<a href="/tambah_stockopname" class="btn btn-primary">
    <i class="fa fa-plus nav-icon"></i>
</a>

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Stock Opname</h4>
        {!! Form::open(['url' => 'stockopname', 'class'=>'form-inline']) !!}
            {{ Form::token() }}
            {{-- <div class="row"> --}}
                <div class="form-group">
                    {!! Form::label('submit_date', 'Choose Date', []) !!}
                    {!! Form::date('submit_date', isset($submit_date) ? $submit_date : \Carbon\Carbon::yesterday()->toDateString(), ['class'=>'form-control mr-2 ml-2']) !!}
                </div>
                {!! Form::submit('Filter Stock Opname', ['class'=>'btn btn-default']) !!}
            {{-- </div> --}}
        {!! Form::close() !!}
    </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Company</th>
                    <th class="text-center">Fix station</th>
                    <!-- <th class="text-center">Saldo akhir</th> -->
                    <th class="text-center">Saldo fisik</th>
                    <th class="text-center">Tanggal Pengukuran</th>

                    <!-- <th class="text-center">Transaction Type</th> -->
                    <!-- <th class="text-center">Transaction Code</th> -->
                    <!-- <th class="text-center">Transaction Date</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($stockopname ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{isset($s->company->company_name) ? $s->company->company_name : ''}}</td>
                    <td>{{isset($s->fixstation->name_station) ? $s->fixstation->name_station : ''}}</td>
                    <!-- <td></td> -->
                    <td>{{$s->qty}}</td>
                    <td>{{$s->tanggal_pengukuran}}</td>

                    <!-- <td>{{$s->transaction_type}}</td>
                    <td>{{$s->transaction_code}}</td>
                    <td>{{date('d-M-Y', strtotime($s->created_at))}}</td> -->
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