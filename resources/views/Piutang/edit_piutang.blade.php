@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/piutang/update/{{$piutang->id}}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Piutang Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="">No Piutang</label>
                        <input type="text" name="no_piutang" value="{{$piutang->no_piutang}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Qty Piutang</label>
                        <input type="number" name="qty_piutang" value="{{$piutang->qty_piutang}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Peminjam</label>
                        <input type="text" name="peminjam" value="{{$piutang->peminjam}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Status Piutang</label>
                        <input type="text" name="status_piutang" value="{{$piutang->status_piutang}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Tgl Pengembalian</label>
                        <input type="date" name="tgl_pengembalian" value="{{$piutang->tgl_pengembalian}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/piutang" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>
@endsection('content')