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
                        <div class="input-group">
                            <input id="equipment-number" name="eq_label" value="{{ old('eq_label')}}" class="form-control" placeholder="Scan Equipment Card" readonly />
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-scan" type="button">Scan</button> 
                            </div>
                        </div>
                        <input type="hidden" id="equipment-number-value" value="{{ old('eq_label') }}" name="equipment_id" class="form-control" required />
                    </div>


                    <div class="form-group">
                        <label>Driver</label>
                        <div class="input-group">
                            <input id="equipmentuser" name="equipmentuser" class="form-control" value="{{ old('equipmentuser') }}" disabled required />
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-scan btn-scan-user" type="button">Scan</button> 
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Voucher</label>
                        <div class="input-group">
                            <input id="voucher" name="voucher_label" value="{{ old('voucher_label') }}" class="form-control" placeholder="Scan voucher" disabled required />
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-scan" type="button">Scan</button> 
                            </div>
                        </div>
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

                    @if (\Auth::user()->mobileassignments->last() != NULL)
                    {!! Form::hidden('station_id', \Auth::user()->mobileassignments->last()->id) !!}
                    @else
                    {!! Form::hidden('station_id', \Auth::user()->fixassignments->last()->id) !!}
                    @endif
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
<script src="https://rawgit.com/kabachello/jQuery-Scanner-Detection/master/jquery.scannerdetection.js"></script>
<script>
    var local_sourceequipment = {!!$equipments-> toJson() !!};

    var local_sourceequsers = {!!$users-> toJson() !!};

    var local_sourcevouchers = {!!$vouchers-> toJson() !!};
    console.log(local_sourcevouchers);
    var equipmentOwner = "";
    // $(window).scrollTop(0);

    $('.btn-scan').click(function(){
       $(this).parent().parent().find('input').focus(); 
    });

    $(document).scannerDetection({
        timeBeforeScanTest: 200, // wait for the next character for upto 200ms
        avgTimeByChar: 100, // it's not a barcode if a character takes longer than 100ms
        onComplete: function(barcode, qty){
        // $('#pTest').text(barcode);
            console.log(barcode);
            var mybarcode = barcode.split(',')
            console.log(mybarcode);
            var identifier = mybarcode[0].split(':')[0];
            if (identifier == "Equipment Number") {
                var equipment_number = mybarcode[0].split(':')[1].trim(),
                    equipment_id = mybarcode[4].split(':')[1].trim();
                equipmentOwner = mybarcode[3].split(':')[1].trim();
                $('#equipment-number').val(equipment_number);
                $('#equipment-number-value').val(equipment_id);
                console.log(equipment_number.substring(0,1));
                
                if (equipment_number.substring(0,1) == 'X') {
                    $('.btn-scan-user').hide();
                    $('#equipmentuser').attr('disabled', false);
                }else if(equipment_number.substring(0,1) == 'I') {
                    $('.btn-scan-user').show();
                    $('#equipmentuser').attr('disabled', true);
                }
                // $('#voucher').attr('disabled', false);   
            }else if(identifier == 'VoucherCode'){
                $.map(local_sourcevouchers, function(item, key) {
                    var serial_number = item.serial_number.toUpperCase();
                    var voucherSN = mybarcode[2].split(':')[1].trim().toUpperCase(),
                        voucherQty = mybarcode[3].split(':')[1].trim(),
                        voucherED = mybarcode[4].split(':')[1].trim();
                    if (serial_number == voucherSN && item.voucher.voucherowner.vendor_name == owner) {
                        alert("HAI");
                    } else {
                        // alert("HELLO");
                    }
                })
            }else if(identifier == ''){

            }
            alert(barcode);
        } // main callback function	
    });
    // console.log(local_sourcevouchers);
    // $('#equipment-number').autocomplete({
    //     source: function(request, response) {
    //         response($.map(local_sourceequipment, function(item, key) {
    //             var equipment_number = item.equipment_number.toUpperCase();
    //             if (equipment_number.indexOf(request.term.toUpperCase()) != -1) {
    //                 return {
    //                     id: item.id,
    //                     value: item.equipment_number,
    //                     label: item.equipment_number,
    //                     owner_id: item.owner_id,
    //                     owner: item.equipmentowner.vendor_name,
    //                     category: item.equipmentcategory.nama
    //                 }
    //             } else {
    //                 return null;
    //             }
    //         }))
    //     },
    //     focus: function(event, ui) {
    //         event.preventDefault();
    //     },
    //     select: function(event, ui) {
    //         console.log(ui);
    //         $('#equipment-number').val(ui.item.value);
    //         $('#equipment-number-value').val(ui.item.id);
    //         $('#voucher').attr('disabled', false);
    //         owner = ui.item.owner_id;
    //         // $('#equipment-number').val(ui.item.label); // display the selected text
    //         // $('#equipment-number_id').val(ui.item.value); // save selected id to hidden input
    //         return false;
    //     },
    //     change: function(event, ui) {
    //         console.log(ui);
    //         $("#equipment-number-value").val(ui.item ? ui.item.id : 0);
    //         // $('.equipment-owner').val(ui.item.owner ? ui.item.owner : 0);
    //         // $('.equipment-category').val(ui.item.category ? ui.item.category : 0);
    //     }
    // });

    // $('#equipmentuser').autocomplete({
    //     source: function(request, response) {
    //         response($.map(local_sourceequsers, function(item, key) {
    //             var name = item.name.toUpperCase();
    //             if (name.indexOf(request.term.toUpperCase()) != -1) {
    //                 return {
    //                     id: item.id,
    //                     value: item.name,
    //                     label: item.name,
    //                 }
    //             } else {
    //                 return null;
    //             }
    //         }))
    //     },
    //     focus: function(event, ui) {
    //         event.preventDefault();
    //     },
    //     select: function(event, ui) {
    //         console.log(ui);
    //         $('#equipmentuser').val(ui.item.value);
    //         $('#equipmentuser-value').val(ui.item.id);
    //         // $('#equipmentuser_id').val(ui.item.value); // save selected id to hidden input
    //         return false;
    //     },
    //     change: function(event, ui) {
    //         console.log(ui);
    //         $("#equipmentuser-value").val(ui.item ? ui.item.id : 0);
    //     }
    // });


    // $('#voucher').autocomplete({
    //     source: function(request, response) {
    //         response($.map(local_sourcevouchers, function(item, key) {
    //             var serial_number = item.serial_number.toUpperCase();
    //             console.log(item);
    //             if (serial_number.indexOf(request.term.toUpperCase()) != -1 && item.voucher.owner == owner) {
    //                 return {
    //                     id: item.id,
    //                     value: item.serial_number,
    //                     serial_number: item.serial_number,
    //                     qty: item.voucher.qty,
    //                 }
    //             } else {
    //                 return null;
    //             }
    //         }))
    //     },
    //     focus: function(event, ui) {
    //         event.preventDefault();
    //     },
    //     select: function(event, ui) {
    //         console.log(ui);
    //         $('#voucher').val(ui.item.value);
    //         $('#voucher-value').val(ui.item.id);
    //         $('#voucher-qty').val(ui.item.qty); // display the selected text
    //         // $('#voucher_id').val(ui.item.value); // save selected id to hidden input
    //         return false;
    //     },
    //     change: function(event, ui) {
    //         console.log(ui);
    //         $("#voucher-value").val(ui.item ? ui.item.id : 0);
    //     }
    // });
</script>

@endpush