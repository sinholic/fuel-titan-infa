@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/merk/update/{{$merk->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Merk</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="">Merk</label>
                        <input type="text" name="merk" value="{{$merk->merk}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Inisial</label>
                        <input type="text" name="inisial" value="{{$merk->inisial}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/merk" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')