@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/equipment_category/update/{{$equipment_category->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Equipment Category</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" value="{{$equipment_category->nama}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Inisial</label>
                        <input type="text" name="inisial" value="{{$equipment_category->inisial}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/equipment_category" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')