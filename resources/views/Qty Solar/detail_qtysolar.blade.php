@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="#" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Varian Qty Solar</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Varian Qty Solar</label>
                        <input type="number" name="qty_solar" value="{{$qty_solar->qty_solar}}" class="form-control" required autofocus readonly>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/qty_solar" class="btn btn-default">Back</a>
                  
                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')