@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Tambah Equipment & Unit Data</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Equipment Number</label>
                        <input type="text " name="equipment_number" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Equipment Category</label>
                        <input type="text" name="equipment_category" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="text" name="fuel_capacity" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Owner</label>
                        {{ Form::select('pic', $owners, null, ['placeholder' => 'Pilih owner...', 'required', 'class' => 'form-control']) }}
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/equipment" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Add Data" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection