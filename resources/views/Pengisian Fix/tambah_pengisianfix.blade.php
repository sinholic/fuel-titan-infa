@extends('master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <form action="/pengisian_fix/create" method="POST">

            @csrf

            <div class="card" style="border-top: 3px solid #9C5C22">
                <div class="card-header">
                    <h3 class="card-title">Add Good Issue On Fix Station</h3>
                </div>

                <div class="card-body">

                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{implode('', $errors->all(':message'))}}
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Equipment Number</label>
                        <input id="equipment-number" name="eq_label" value="{{ old('eq_label')}}" class="form-control" placeholder="Scan Equipment Card" required />
                        <input type="hidden" id="equipment-number-value" value="{{ old('eq_label') }}" name="equipment_id" class="form-control" required />
                    </div>


                    <div class="form-group">
                        <label>Driver</label>
                        <input id="equipmentuser" name="equser_label" class="form-control" value="{{ old('equser_label') }}" required />
                        <input type="hidden" id="equipmentuser-value" value="{{ old('equipmentuser_id') }}" name="equipmentuser_id" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label>Voucher</label>
                        <input id="voucher" name="voucher_label" value="{{ old('voucher_label') }}" class="form-control" placeholder="Scan voucher" disabled required />
                        <input type="hidden" id="voucher-value" name="voucher_id" value="{{ old('voucher_id') }}" class="form-control" required />
                    </div>

                    <div class="form-group">
                        <label>Qty</label>
                        <input id="voucher-qty" type="number" value="{{ old('qty') }}" name="qty" placeholder="" class="form-control" readonly autofocus>
                    </div>


                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="number" name="odometer" value="{{ old('odometer') }}" placeholder="" class="form-control" required autofocus>
                    </div>

                    <div class="form-group">
                        <label>Remark</label>
                        <input type="text" name="remark" value="{{ old('remark') }}" placeholder="" class="form-control" required autocomplete="">
                    </div>

                    {!! Form::hidden('origin', 'Fix Station') !!}
                    {!! Form::hidden('station_id', '1') !!}
                    {!! Form::hidden('loginuser_id', \Auth::user()->id) !!}

                </div>

                <div class="card-footer">

                    <a href="/pengisian_fix" class="btn btn-default">Back</a>
                    &nbsp;&nbsp;
                    <input type="submit" value="Save" class="pull-right btn btn-primary">

                </div>

            </div>

        </form>

    </div>
</div>

@endsection

@push('scripts')

<script>
    var local_sourceequipment = {!!$equipments-> toJson() !!};

    var local_sourceequsers = {!!$users-> toJson() !!};

    var local_sourcevouchers = {!!$vouchers-> toJson() !!};

    var owner = 0;

    console.log(local_sourcevouchers);

    $('#equipment-number').autocomplete({
        source: function(request, response) {
            response($.map(local_sourceequipment, function(item, key) {
                var equipment_number = item.equipment_number.toUpperCase();

                if (equipment_number.indexOf(request.term.toUpperCase()) != -1) {
                    return {
                        id: item.id,
                        value: item.equipment_number,
                        label: item.equipment_number,
                        owner_id: item.owner_id,
                        owner: item.equipmentowner.vendor_name,
                        category: item.equipmentcategory.nama
                    }
                } else {
                    return null;
                }
            }))
        },
        focus: function(event, ui) {
            event.preventDefault();
        },
        select: function(event, ui) {
            console.log(ui);
            $('#equipment-number').val(ui.item.value);
            $('#equipment-number-value').val(ui.item.id);
            $('#voucher').attr('disabled', false);
            owner = ui.item.owner_id;
            // $('#equipment-number').val(ui.item.label); // display the selected text
            // $('#equipment-number_id').val(ui.item.value); // save selected id to hidden input
            return false;
        },
        change: function(event, ui) {
            console.log(ui);
            $("#equipment-number-value").val(ui.item ? ui.item.id : 0);
            // $('.equipment-owner').val(ui.item.owner ? ui.item.owner : 0);
            // $('.equipment-category').val(ui.item.category ? ui.item.category : 0);
        }
    });

    $('#equipmentuser').autocomplete({
        source: function(request, response) {
            response($.map(local_sourceequsers, function(item, key) {
                var name = item.name.toUpperCase();

                if (name.indexOf(request.term.toUpperCase()) != -1) {
                    return {
                        id: item.id,
                        value: item.name,
                        label: item.name,
                    }
                } else {
                    return null;
                }
            }))
        },
        focus: function(event, ui) {
            event.preventDefault();
        },
        select: function(event, ui) {
            console.log(ui);
            $('#equipmentuser').val(ui.item.value);
            $('#equipmentuser-value').val(ui.item.id);
            // $('#equipmentuser_id').val(ui.item.value); // save selected id to hidden input
            return false;
        },
        change: function(event, ui) {
            console.log(ui);
            $("#equipmentuser-value").val(ui.item ? ui.item.id : 0);
        }
    });


    $('#voucher').autocomplete({
        source: function(request, response) {
            response($.map(local_sourcevouchers, function(item, key) {
                var serial_number = item.serial_number.toUpperCase();
                console.log(item);

                if (serial_number.indexOf(request.term.toUpperCase()) != -1 && item.voucher.owner == owner) {
                    return {
                        id: item.id,
                        value: item.serial_number,
                        serial_number: item.serial_number,
                        qty: item.voucher.qty,
                    }
                } else {
                    return null;
                }
            }))
        },
        focus: function(event, ui) {
            event.preventDefault();
        },
        select: function(event, ui) {
            console.log(ui);
            $('#voucher').val(ui.item.value);
            $('#voucher-value').val(ui.item.id);
            $('#voucher-qty').val(ui.item.qty); // display the selected text
            // $('#voucher_id').val(ui.item.value); // save selected id to hidden input
            return false;
        },
        change: function(event, ui) {
            console.log(ui);
            $("#voucher-value").val(ui.item ? ui.item.id : 0);
        }
    });
</script>

@endpush