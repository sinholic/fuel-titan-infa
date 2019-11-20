@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="#" method="POST">

            @csrf
           
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Tipe Equipment</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Merk</label>
                    <input type="text" name="merk" value="{{$tipe_equipment->merk}}" class="form-control" required  readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Tipe Equipment</label>
                        <input type="" name="tipe" value="{{$tipe_equipment->tipe}}" class="form-control" required autofocus readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Kelas Equipment</label>
                        <input type="" name="kelas" value="{{$tipe_equipment->kelas}}" class="form-control" required autofocus readonly>
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/tipe_equipment" class="btn btn-default">Back</a>
              
                </div>

            </div>

        </form>

    </div>
</div>



@endsection('content')