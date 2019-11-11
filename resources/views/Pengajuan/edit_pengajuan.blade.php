@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengajuan/update/{{$pengajuan->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengajuan Hutang Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" name="supplier" value="{{$pengajuan->supplier}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Qty</label>
                        <input type="text" name="qty" value="{{$pengajuan->qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
						<input type="text" name="remark" value="{{$pengajuan->remark}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>No SPK</label>
                        <input type="text" name="no_spk" value="{{$pengajuan->no_spk}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Peminjam</label>
                        <input type="text" name="peminjam" value="{{$pengajuan->peminjam}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>StockOpname</label>
                        <input type="number" name="stockopname" value="{{$pengajuan->stockopname}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/pengajuan" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')