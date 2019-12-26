@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengisian_fix/update/{{$pengisian_fix->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Good Issue On Fix Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="">Unit Equipment</label>
                        <input type="text" name="equipment_number" value="{{$pengisian_fix->equipment->equipment_number}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label>Id Driver</label>
                        <input type="text" name="equipmentuser" value="{{$pengisian_fix->equipmentuser}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label>Qty Solar</label>
                        <input type="number" name="qty" value="{{$pengisian_fix->qty}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="number" name="odometer" value="{{$pengisian_fix->odometer}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" value="{{$pengisian_fix->remark}}" class="form-control" required autofocus>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/pengisian_fix" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')