@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/voucher/update/{{$voucher->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Voucher</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    {{-- <div class="form-group">
                        <label>Code Voucher</label>
                        <input type="text" name="code_number" value="{{$voucher->code_number}}" class="form-control" required autofocus>
                    </div> --}}

                    <div class="form-group">
                        <label for="">Qty</label>
                        <input type="text" name="qty" value="{{$voucher->qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        <input type="text" name="owner" value="{{$voucher->owner}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Expired Date</label>
                        <input type="date" name="expired_date" value="{{$voucher->expired_date}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/voucher" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')