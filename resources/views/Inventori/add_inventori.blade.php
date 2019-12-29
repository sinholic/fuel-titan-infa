@extends('master')

@section('content')

<div class="row">
	<div class="col-md-12">
		<form action="/inventori/create" method="POST">

			@csrf

			<div class="card" style="border-top: 3px solid #9C5C22">
				<div class="card-header">
					<h3 class="card-title">Tambah Inventori</h3>
				</div>

				<div class="card-body">

					@if($errors->any())
					<div class="alert alert-danger">
						{{implode('', $errors->all(':message'))}}
					</div>
					@endif

					
                    <div class="form-group">
					<label>Material</label>
                    <select class="form-control" name="kode_barang">
                        @foreach($databarang as $row)
                            <option id="{{$row->id}}" value="{{$row->id}}">{{$row->materials}}</option>
                        @endforeach
                    </select>
                    </div>
					<div class="form-group">
					<label>Fix Stations</label>
                    <select class="form-control" name="fix_id">
                        @foreach($fix_station as $row)
                            <option id="{{$row->id}}" value="{{$row->id}}">{{$row->name_station}}</option>
                        @endforeach
                    </select>
                    </div>
                    <!-- <div class="form-group">
						<label>Kode Barang</label>
						<input type="text" name="kode_barang" value="{{ old('inventori')}}" placeholder="" class="form-control" required autofocus>
					</div> -->
                    <div class="form-group">
						<label>Saldo awal</label>
						<input type="text" name="saldo_awal" value="{{ old('inventori')}}" placeholder="" class="form-control" required autofocus>
					</div>

				</div>

				<div class="card-footer">

					<a href="/inventori" class="btn btn-default">Back</a>
					&nbsp;&nbsp;
					<input type="submit" value="Save" class="pull-right btn btn-primary">

				</div>

			</div>

		</form>

	</div>
</div>



@endsection