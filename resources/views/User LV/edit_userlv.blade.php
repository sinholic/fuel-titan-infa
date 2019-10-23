@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/userlv/update/{{$userlv->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User LV</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" value="{{$userlv->nik}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" value="{{$userlv->nama}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Organization</label>
                        <input type="text" name="organization" value="{{$userlv->organization}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        <input type="text" name="owner" value="{{$userlv->owner}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/userlv" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')