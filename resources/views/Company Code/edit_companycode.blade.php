@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/companycode/update/{{$companycode->id}}" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Company Code</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Name Company Code</label>
                        <input type="text" name="company_name" value="{{$companycode->company_name}}" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Inisial Company Code</label>
                        <input type="text" name="company_inisial" value="{{$companycode->company_inisial}}" class="form-control" required autofocus>
                    </div>


                </div>

                <div class="card-footer">

                    <a href="/companycode" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')