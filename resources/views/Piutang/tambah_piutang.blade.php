@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/piutang/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Tambah Piutang Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>No Piutang</label>
                        <input type="text" name="no_piutang" value="{{ old('no_piutang')}}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Qty Piutang</label>
                        <input type="number" name="qty_piutang" value="{{ old('qty_piutang')}}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Peminjam</label>
                        <input type="text" name="peminjam" value="{{ old('peminjam')}}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Status Piutang</label>
                        <input type="text" name="status_piutang" value="{{ old('status_piutang')}}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Tgl Pengembalian</label>
                        <input type="date" name="tgl_pengembalian" value="{{ old('tgl_pengembalian')}}" placeholder="" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/piutang" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Save" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection