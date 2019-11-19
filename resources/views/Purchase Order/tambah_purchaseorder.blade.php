@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/purchase-order/import" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Purchase Order</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Excel File</label>
                        <input type="file" name="" value="" class="form-control" required autofocus>
                    </div>
                </div>

                <div class="card-footer">

                    <a href="/purchase-order" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')