@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/fix/update/{{$fix->id}}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Fix Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
						<label>Nama Company</label>
						<input id="company-code" name="cc_label" value="{{ $fix->company->company_name }}" class="form-control"
							readonly placeholder="Cari company code" />
						<input type="hidden" id="company-code-value" value="{{ $fix->companycode_id }}"
							name="companycode_id" class="form-control" required />
					</div>

                    <div class="form-group">
                        <label>Nama Station</label>
                        <input type="text" name="name_station" value="{{$fix->name_station}}" class="form-control"
                            required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" name="address" value="{{$fix->address}}" class="form-control" required
                            autofocus>
                    </div>

                    <div class="form-group nama-lokasi">
						<label>Nama Lokasi</label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text inisial" id="basic-addon3">{{ substr($fix->company->company_inisial,0, 2) }}</span>
							</div>
							<input type="text" class="form-control" name="nama_lokasi" id="nama-lokasi"
								aria-describedby="basic-addon3" value="{{$fix->nama_lokasi}}">
						</div>
					</div>

                    <div class="form-group">
                        <label>Koordinat GPS</label>
                        <input type="text" name="koordinat_gps" value="{{$fix->koordinat_gps}}" class="form-control"
                            required autofocus>
                    </div>

                    <div id="tanks">
                        @foreach ($tanks as $tank)
                        <div id="{{ $loop->first ? 'tank' : ''}}">
                            <div class="form-group">
                                <label>Tank Number</label>
                                <input type="text" name="tank_number[]" value="{{ $tank->tank_number }}" placeholder=""
                                    class="form-control" required autocomplete="">
                            </div>

                            <div class="form-group">
                                <label>Tank Capacity</label>
                                <div class="input-group">
                                    <input type="number" name="fuel_capacity[]" value="{{ $tank->fuel_capacity }}"
                                        placeholder="" class="form-control" required autocomplete="">
                                    <div class="input-group-btn">
                                        @if ($loop->first)
                                        {{-- <button id="addtank" class="btn btn-success" type="button">
                                                        <i class="fa fa-plus"></i>
                                                    </button> --}}
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-"></div>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="card-footer">

                    <a href="/fix" class="btn btn-default">Back</a>
                    <input type="submit" value="Save" class="pull-right btn btn-warning">

                </div>

            </div>

        </form>

    </div>
</div>

@endsection

@push('scripts')
    
    <script>
        var local_source = {!!$companycodes->toJson() !!};

        console.log(local_source);
        // $('.nama-lokasi').hide();

        $('#nama-lokasi').mask('00-A', {
            translation: {
                A: {
                    pattern: /[A-Za-z0-9]/,
                    recursive: true
                },
            },
            placeholder: "00-____________________________________________________________"
        });

        $('#company-code').autocomplete({
            source: function (request, response) {
                response($.map(local_source, function (item, key) {

                    var company_name = item.company_name.toUpperCase();

                    if (company_name.indexOf(request.term.toUpperCase()) != -1) {
                        return {
                            id: item.id,
                            value: item.company_name,
                            inisial: item.company_inisial
                        }
                    } else {
                        return null;
                    }
                }))
            },
            select: function (event, ui) {
                $('.nama-lokasi').show();
                $('#company-code-value').val(ui.item.id);
                $('.inisial').html(ui.item.inisial.substr(0, 2));
                return false;
            },
            change: function (event, ui) {
                console.log(ui);
                $("#company-code-value").val(ui.item ? ui.item.id : 0);
            }
        });
    </script>

@endpush