@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/consignment/update/{{$consignment->id}}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Consignment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>No PO</label>
                        <input type="text" name="no_po" value="{{$consignment->no_po}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Supplier</label>
                        <input type="text" name="supplier" value="{{$consignment->supplier}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Qty</label>
                        <input type="number" name="qty" value="{{$consignment->qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Qty Diterima</label>
                        <input type="number" name="qty_diterima" value="{{$consignment->qty_diterima}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">No Tangki</label>
                        <input type="text" name="no_tangki" value="{{$consignment->no_tangki}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Remark</label>
                        <input type="text" name="remark" value="{{$consignment->remark}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/consignment" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')