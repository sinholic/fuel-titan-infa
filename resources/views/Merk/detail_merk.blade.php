@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="#" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Merk</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="">Merk</label>
                        <input type="text" name="merk" value="{{$merk->merk}}" class="form-control" required readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Inisial</label>
                        <input type="text" name="inisial" value="{{$merk->inisial}}" class="form-control" required autofocus readonly>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/merk" class="btn btn-default">Back</a>

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')