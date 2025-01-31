@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/owner/update/{{$owner->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Owner</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama Vendor</label>
                        <input type="text" name="vendor_name" value="{{$owner->vendor_name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
						<label>Inisial Vendor</label>
						<input type="text " name="vendor_inisial" value="{{$owner->vendor_inisial}}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" value="{{$owner->address}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Kategori Owner</label>
						{{ Form::select('owner_category', ['Internal' => 'Internal', 'External' => 'External'], $owner->owner_category, ['placeholder' => 'Pilih kategori...', 'required', 'class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>PIC</label>
                        <input type="text" name="pic" value="{{$owner->pic}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="number" name="phone" value="{{$owner->phone}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{$owner->email}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/owner" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')