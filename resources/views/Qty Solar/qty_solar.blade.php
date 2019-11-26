@extends('master')
 
@section('content')

{{-- Notifikasi form validasi --}}
    @if ($errors->has('file'))
        <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('file')}}</strong>
        </span>
    @endif

    {{-- notifikasi sukses --}}
	@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<i class="icon fas fa-check"></i> {{ $sukses }}
		</div>
    @endif
    
    <a href="/tambah_qtysolar" class="btn btn-primary">
        <i class="fa fa-plus nav-icon"></i>
    </a>

<div class="card" style="border-top: 3px solid #9C5C22">
        
       <div class="card-header">
            <h4>Varian Qty Solar</h4>
        </div>

    <div class="card-body">
        <table class="table table-striped table table-bordered" id="myTable">
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Varian Qty Solar</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                 @foreach($qty_solar ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    {{-- <td>{{$s->qtysolar->qty_solar ?? ''}}</td> --}}
                    <td>{{$s->qty_solar}}</td>
                    <td>
                         <div class="btn-group">

                            <a href="/qty_solar/edit/{{$s->id}}" class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a href="#" class="btn btn btn-danger btn-sm delete" qty-nama="{{$s->qty_solar}}" qty-id="{{$s->id}}">
                                <i class="fa fa-trash nav-icon"></i>
                            </a>

                        </div>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $('.delete').click(function(){
        var qty_id = $(this).attr('qty-id');
        var qty_nama = $(this).attr('qty-nama');
        swal({
        title: "Are you sure?",
        text: "Anda yakin akan menghapus varian solar "+qty_nama+ " liter?",
        icon: "warning",
        buttons: true,
        dangerMode: true, 
        })
        .then((willDelete) => { 
            console.log(willDelete);
        if (willDelete) {
           window.location = "/qty_solar/"+qty_id+"/delete"
        }
        });
    });
</script>

@endsection