@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/owner/update/{{$owner->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Owner</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Jenis Unit</label>
                        <input type="text" name="jenis_unit" value="{{$owner->jenis_unit}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Number</label>
                        <input type="text" name="unit_number" value="{{$owner->unit_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Unit Category</label>
                        <input type="text" name="unit_category" value="{{$owner->unit_category}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Vendor</label>
                        <input type="text" name="vendor" value="{{$owner->vendor}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="{{$owner->address}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/owner" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')