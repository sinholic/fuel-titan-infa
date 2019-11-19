@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="#" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Pengajuan Hutang Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" name="supplier" value="{{$pengajuan->supplier}}" class="form-control" required  readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Qty</label>
                        <input type="text" name="qty" value="{{$pengajuan->qty}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
						<input type="text" name="remark" value="{{$pengajuan->remark}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label>No SPK</label>
                        <input type="text" name="no_spk" value="{{$pengajuan->no_spk}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label>Peminjam</label>
                        <input type="text" name="peminjam" value="{{$pengajuan->peminjam}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label>StockOpname</label>
                        <input type="number" name="stockopname" value="{{$pengajuan->stockopname}}" class="form-control" required autofocus readonly>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/pengajuan" class="btn btn-default">Back</a>
                  
                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')