@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment/update/{{$equipment->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Equipment & Unit Data</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Equipment Number</label>
                        <input type="text" name="equipment_number" value="{{$equipment->equipment_number}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Equipment Name</label>
                        <input type="text" name="equipment_name" value="{{$equipment->equipment_name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Equipment Category</label>
                        {{ Form::select('equipment_category', $equipment_categories, $equipment->equipment_category, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" value="{{$equipment->location}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Fuel Capacity</label>
                        <input type="text" name="fuel_capacity" value="{{$equipment->fuel_capacity}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Owner</label>
                        {{ Form::select('pic', $owners, $equipment->pic, ['placeholder' => 'Pilih owner...', 'required', 'class' => 'form-control']) }}
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/equipment" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')