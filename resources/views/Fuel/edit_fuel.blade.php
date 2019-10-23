@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/fuel/update/{{$fuel->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Penerimaan Fuel</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" value="{{$fuel->quantity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Amount in LC Currency</label>
                        <input type="text" name="amount" value="{{$fuel->amount}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Vendor</label>
                        <input type="text" name="vendor" value="{{$fuel->vendor}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Station</label>
                        <input type="text" name="fuel" value="{{$fuel->fuel}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Tank Number</label>
                        <input type="text" name="tank_number" value="{{$fuel->tank_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Invoice Number</label>
                        <input type="text" name="invoice_number" class="form-control" value="{{$fuel->invoice_number}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Document Date</label>
                        <input type="text" name="document_date" class="form-control" value="{{$fuel->document_date}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Posting Date</label>
                        <input type="text" name="posting_date" class="form-control" value="{{$fuel->posting_date}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Driver Name</label>
                        <input type="text" name="driver_name" class="form-control" value="{{$fuel->driver_name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Recipient</label>
                        <input type="text" name="recipient" class="form-control" value="{{$fuel->recipient}}" required>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/fuel" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="btn btn-warning pull-right">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')