@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/consignment/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Tambah Consignment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('<br/>', $errors->all(':message'))}}
                    </div>
                    @endif


                    <div class="form-group">
                        <label>No PO</label>
                        <input type="text" name="no_po" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Supplier</label>
                        <input type="text" name="supplier" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Qty</label>
                        <input type="number" name="qty" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">No Tangki</label>
                        <input type="text" name="no_tangki" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                </div>

                <div class="card-footer">

                    <a href="/consignment" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Save" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>

@endsection