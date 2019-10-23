@extends('master')
 
@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered" id="example1">
            <thead>
                <tr style="background-color: aqua">
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@stop
 
{{-- @push('scripts') 
<script>
$(function() {
    $('#example1').DataTable({
        processing: true, 
        serverSide: true, 
        ajax: 'user/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush --}}
