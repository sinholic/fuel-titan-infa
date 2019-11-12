@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/userassign/update/{{$user->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit User Assignment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>ID User</label>
                        <input type="number" name="user_id" value="{{$user->user_id}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">ID Station</label>
                        <input type="number" name="station_id" value="{{$user->station_id}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="Number" name="mobile" value="{{$user->mobile}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Start Date</label>
                        <input type="date" name="start_date" value="{{$user->start_date}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>End Date</label>
                        <input type="date" name="end_date" value="{{$user->end_date}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/userassign" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')