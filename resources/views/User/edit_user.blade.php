@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/user/update/{{$user->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>IMEI</label>
                        <input type="number" name="imei" value="{{$user->imei}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>User level</label>
						{{ Form::select('status_id', $statuses, null, ['placeholder' => 'Pilih user level...', 'required', 'class' => 'form-control']) }}
					</div>

                </div>

                <div class="card-footer">

                    <a href="/user" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')