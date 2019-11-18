@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/timesheetstatus/update/{{$status->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Timesheet Status</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
						<label>Category</label>
						{{ Form::select('category', ['Working' => 'Working', 'Stand By' => 'Stand By', 'Break Down' => 'Break Down'], $status->category, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
					</div>
					
					<div class="form-group">
						<label for="">Cause</label>
						{!! Form::text('status', $status->status, ['class' => 'form-control', 'required']) !!}
					</div>

                </div>

                <div class="card-footer">

                    <a href="/timesheetstatus" class="btn btn-default">Back</a>
                    <input type="submit" value="Update Data" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')