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

<div class="card" style="border-top: 3px solid #9C5C22">

    <div class="card-header">
        <h4>Daftar Pengisian Solar</h4>
    </div>

    <div class="card-body">
        <table class="table table-striped table table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Unit Equipment</th>
                    <th class="text-center">Unit Mobile Station</th>
                    <th class="text-center">Driver Mobile Statis</th>
                    <th class="text-center">Qty Solar (Mobile)</th>
                    <th class="text-center">Odometer (KM)</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                @foreach($daf_pengisian ?? '' as $s)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$s->equipment->equipment_number ?? ''}}</td>
                    <td>{{$s->mobilestation->equipment->equipment_number}}</td>
                    <td>{{$s->driver_mobile_statis}}</td>
                    <td>{{$s->qty_solar}}</td>
                    <td>{{$s->odometer}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection