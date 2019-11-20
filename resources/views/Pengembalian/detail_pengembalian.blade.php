@extends('master')

@section('content')

<div class="row">
<div class="col-md-12">
    <form action="#" method="POST">

        @csrf
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Pengembalian Solar</h3>
            </div>

            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-danger">
                    {{implode('', $errors->all(':message'))}}
                </div>
                @endif

                <div class="form-group">
                    <label>Hutang</label>
                    <input type="text" name="" value="" class="form-control" required  readonly>
                </div>

                <div class="form-group">
                    <label for="">Qty</label>
                    <input type="number" name="qty" value="{{$pengembalian->qty}}" class="form-control" required autofocus readonly>
                </div>

                <div class="form-group">
                    <label for="">Tanggal Pengembalian</label>
                    <input type="date" name="date" value="{{$pengembalian->date}}" class="form-control" required autofocus readonly>
                </div>


            </div>

            <div class="card-footer">

                <a href="/pengembalian" class="btn btn-default">Back</a>
                
            </div>

        </div>

    </form>

</div>
</div>



@endsection('content')