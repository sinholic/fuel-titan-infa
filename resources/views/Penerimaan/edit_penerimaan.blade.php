@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/penerimaan/update/{{$penerimaan->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Penerimaan Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" value="{{$penerimaan->remark}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" value="{{$penerimaan->supplier}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>No PO</label>
                        <input type="number" name="no_po" value="{{$penerimaan->no_po}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" name="qty" value="{{$penerimaan->qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>Received Qty</label>
						<input type="text" name="received_qty" value="{{$penerimaan->received_qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>No Tangki</label>
                        <input type="text" name="no_tangki" value="{{$penerimaan->no_tangki}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/penerimaan" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')