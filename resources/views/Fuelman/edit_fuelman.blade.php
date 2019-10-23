@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/fuelman/update/{{$fuelman->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Fuelman</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" value="{{$fuelman->nik}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$fuelman->name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Location Assignment</label>
                        <input type="text" name="location_assignment" value="{{$fuelman->location_assignment}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Password Login</label>
                        <input type="text" name="password_login" value="{{$fuelman->password_login}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Password Sync</label>
                        <input type="text" name="password_sync" value="{{$fuelman->password_sync}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">IMEI</label>
                        <input type="text" name="imei" class="form-control" value="{{$fuelman->imei}}" required>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/fuelman" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')