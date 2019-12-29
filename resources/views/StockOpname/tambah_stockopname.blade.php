@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/stockopname/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah StockOpname</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif
					<div class="form-group">
						<label>Fix Stations</label>
						<!-- <input type="number" name="fixstation_id" value="{{ old('fixstation_id')}}" placeholder="" class="form-control" required autofocus> -->
						<select class="form-control" name="fixstation_id">
						@foreach($fixstation as $row)
                            <option id="{{$row->fix_id}}" value="{{$row->fix_id}}">{{$row->fixstation->name_station}}</option>
                        @endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Qty</label>
						<input type="number" name="qty" value="{{ old('qty')}}" placeholder="" class="form-control" required autofocus>
                    </div>
                    
                    <div class="form-group">
						<label>Tanggal Pengukuran</label>
						<input type="date" name="tanggal_pengukuran" value="{{ old('tanggal_pengukuran')}}" placeholder="" class="form-control" required autofocus>
					</div>

				</div>

				<div class="card-footer">

					<a href="/stockopname" class="btn btn-default">Back</a>
					&nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection