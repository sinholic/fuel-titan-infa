@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengisian_mobile/update/{{$pengisian_mobile->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Good Issue On Mobile Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama Pengawas</label>
                        <input type="text" name="equipmentuser_id" value="{{$pengisian_mobile->equipmentuser->name}}" class="form-control" disabled autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Unit Equipment</label>
                        {{ Form::select('equipment_id', $equipments, $pengisian_mobile->equipment_id, ['placeholder' => 'Pilih equipment...', 'disabled', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Qty Solar</label>
                        {!! Form::text('qty', $pengisian_mobile->qty, ['class'=>'form-control', 'disabled']) !!}
                    </div>

                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="text" name="odometer" value="{{$pengisian_mobile->odometer}}" class="form-control" disabled autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Remark History</label>
                        <div class="clearfix">
                            {{ $pengisian_mobile->remark }}
                        </div>
                        <div class="clearfix">
                            {{ $pengisian_mobile->remark2 }}
                        </div>
                        <div class="clearfix">
                            {{ $pengisian_mobile->remark3 }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Add Remark</label>
                        @if ($pengisian_mobile->remark == NULL)
                            <input type="text" name="remark" value="" class="form-control" required autofocus>
                        @elseif($pengisian_mobile->remark2 == NULL)
                            <input type="text" name="remark2" value="" class="form-control" required autofocus>
                        @elseif($pengisian_mobile->remark3 == NULL)
                            <input type="text" name="remark3" value="" class="form-control" required autofocus>
                        @else
                            <input type="text" placeholder="You can't add another remark" name="" id="" disabled>
                        @endif
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/pengisian_mobile" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')