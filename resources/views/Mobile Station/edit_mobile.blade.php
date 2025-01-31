@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/mobile/update/{{$mobile->id}}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Mobile Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Fix Station</label>
                        {{ Form::select('fixstation_id', $fixstations, $mobile->fixstation_id, ['placeholder' => 'Pilih fix station...', 'required', 'class' => 'form-control']) }}
                    </div>

                    
					<div class="form-group">
						<label>Equipment Number</label>
						{{ Form::select('equipment_id', $equipments, $mobile->equipment_id, ['placeholder' => 'Pilih equipment...', 'readonly', 'class' => 'form-control']) }}
					</div>

                    <div class="form-check">
                        {{ Form::checkbox('impress_status', 1, ($mobile->impress_status ? true : NULL), ['class' => 'form-check-input enable-impress']) }}
                        <label>Enable Impress System</label>
                    </div>

                    <div class="form-group max-reload">
                        <label>Maksimal Pengisian Ulang</label>
                        <input type="text" name="fuel_max_reload" value="{{$mobile->fuel_max_reload}}" placeholder=""
                            class="form-control">
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/mobile" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>
            </div>
        </form>
    </div>
</div>



@endsection('content')


@push('scripts')

<script>
    if ($('.enable-impress').is(':checked')) {
        $('.max-reload').show();
    }else {
        $('.max-reload').hide();
    }

    $('.enable-impress').click(function () {
        $('.max-reload').toggle();
    })
</script>


@endpush