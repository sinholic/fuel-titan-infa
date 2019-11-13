@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengisian_mobile/update/{{$pengisian_mobile->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Pengisian Solar On Mobile Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Id Driver</label>
                        <input type="text" name="id_driver" value="{{$pengisian_mobile->id_driver}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Equipment</label>
                        <input type="text" name="unit_equipment" value="{{$pengisian_mobile->unit_equipment}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>Qty Solar</label>
						{{ Form::select('qty_solar', $qty_solar, null, ['placeholder' => 'Pilih jumlah solar...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="text" name="odometer" value="{{$pengisian_mobile->odometer}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" value="{{$pengisian_mobile->remark}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/pengisian_mobile" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')