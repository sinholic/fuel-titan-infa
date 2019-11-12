@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/upload/update/{{$upload->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Upload File</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label></label>
                        <input type="text" name="" value="{{$upload->}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" value="{{$upload->}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="" value="{{$upload->}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/upload" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')