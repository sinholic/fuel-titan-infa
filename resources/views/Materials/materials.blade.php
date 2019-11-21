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
			<strong>{{ $sukses }}</strong>
        </div>
        <script>Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Sukses!',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif

    <a href="/tambah_materials" class="btn btn-primary">
        <i class="fa fa-plus nav-icon"></i>
    </a>

<div class="card" style="border-top: 3px solid #9C5C22">
        
       <div class="card-header">
            <h4>Master Materials</h4>
        </div>

    <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable"> 
            <thead style="background-color: #9C5C22">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Materials</th>
                    <th class="text-center" width="8%">Action</th>
                </tr>
            </thead>
            @php $i=1 @endphp
            <tbody>
                @php $i=1 @endphp
                 @foreach($materials ?? '' as $s)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$s->materials}}</td>
                    <td>
                         <div class="btn-group">

                            <a href="/materials/edit/{{$s->id}}"  class="btn btn-warning  btn-sm" data-toggle="tootip" data-placement="bottom" title="Edit">
                                <i class="fa fa-edit nav-icon"></i>
                            </a>

                            <a onClick="sweet()" href="/materials/{{$s->id}}/delete" class="btn btn btn-danger btn-sm">
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
    function sweet(){
        event.preventDefault();
          Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, hapus!'
        }).then((result) => {
        if (result.value) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    }
  
</script>

@endsection