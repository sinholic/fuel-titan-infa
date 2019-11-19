@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengambilan/update/{{$pengambilan->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengambilan Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Qty</label>
                        <input type="text" name="qty" value="{{$pengambilan->qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Pengambilan</label>
                        <input type="date" name="date" value="{{$pengambilan->date}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/pengambilan" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')