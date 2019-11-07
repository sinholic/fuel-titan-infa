@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengisian_fix/update/{{$pengisian_fix->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengisian Solar On Fix Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Id Driver</label>
                        <input type="text" name="id_driver" value="{{$pengisian_fix->id_driver}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Equipment</label>
                        <input type="text" name="unit_equipment" value="{{$pengisian_fix->unit_equipment}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Qty Solar</label>
                        <input type="text" name="qty_solar" value="{{$pengisian_fix->qty_solar}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="text" name="odometer" value="{{$pengisian_fix->odometer}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" value="{{$pengisian_fix->remark}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/pengisian_fix" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')