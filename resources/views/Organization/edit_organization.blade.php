@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/organization/update/{{$organization->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User HE</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" value="{{$organization->nik}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$organization->name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" value="{{$organization->password}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Organization</label>
                        <input type="text" name="organization" value="{{$organization->organization}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        <input type="text" name="owner" value="{{$organization->owner}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/organization" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')