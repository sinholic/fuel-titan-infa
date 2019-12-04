<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Print QR Voucher</title>
    <style>
        p {
            margin-left: 2mm;
        }

        table tr {
            margin: 0;
            line-height: 1.2;
        }

        .voucher-container {
            height: 40mm;
            width: 40mm;
            border: 1px solid black;
            margin-bottom: 5mm;
            margin-left: 5mm;
            margin-top: 5mm;
        }

        .voucher-container .title {
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
        }

        .left-container {
            width: 69%;
            float: left;
            text-align: left;
            display: flex;
        }

        .right-container {
            float: left;
            width: calc();
            width: 31%;
            display: flex;
        }

        .table-cont {
            margin-left: 20px;
            margin-bottom: 5mm;
        }

        .float-left {
            float: left;
        }

        .small {
            font-size: 0.5em;
        }

        serial-number {
            font-size: 10px;
            text-align: center;
            /* margin-left: 2mm; */
            /* margin-top: 12mm; */
            display: block;
            clear: both;
        }

        @media print {

            .voucher-container,
            .table-cont,
            .float-left,
            .print {
                display: none;
                visibility: hidden;
            }

            .voucher-container {
                page-break-after: always;
            }

            .selected {
                display: block;
                visibility: visible;
            }
        }

        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }
    </style>
</head>

<body>
    <a href="#" class="btn btn-primary" style="float: right" ; onclick="window.print();">Print</a>
    <table class="table-cont">
        <tr>
            <td>
                <input type="checkbox" name="" checked id="check-all"> Check All
            </td>
            <td></td>
        </tr>
    </table>
    @php
    $qty = $voucher->qty;
    $vendorName = isset($voucher->voucherowner) ? $voucher->voucherowner->vendor_name:"null";
    $expired_date = $voucher->expired_date;
    @endphp
    @foreach($voucher->vouchercodes as $vouchercode)
    @php
    $used = $vouchercode->used ? "true" : "false";
    $rejected = $vouchercode->rejected ? "true" : "false";
    @endphp
    @php $string =
    "VoucherCode: $vouchercode->code_number,
    VoucherID: $vouchercode->id,
    SN: $vouchercode->serial_number,
    Qty : $qty,
    Owner: $vendorName,
    Used: $used,
    Rejected: $rejected,
    Expired: $expired_date"
    @endphp
    <div style="margin-left:20px;">
        <div class="float-left">
            <input type="checkbox" class="checkbox" checked name="" id="">
        </div>
        <div class="voucher-container selected">
            <div style="margin-top:3mm"></div>
            <div class="left-container">
                {!! QrCode::size(110)->margin(0)->generate($string); !!}
            </div>
            <div class="right-container">
                <table style="margin-top:3mm">
                    <tr>
                        <td colspan="2">
                            <h4>{{ $qty }} L</h4>
                        </td>
                    </tr>
                    <tr class="small">
                        <td>Owner</td>
                        <td>:</td>
                    </tr>
                    <tr class="small">
                        <td colspan="2">{{ isset($voucher->voucherowner) ? $voucher->voucherowner->vendor_inisial : "null" }}</td>
                    </tr>
                    <tr class="small">
                        <td>Exp. Date.</td>
                        <td>:</td>
                    </tr>
                    <tr class="small">
                        <td colspan="2">{{ date('d M Y', strtotime($voucher->expired_date)) }}</td>
                    </tr>
                </table>
            </div>
            <serial-number>No: {{ $vouchercode->serial_number }}</serial-number>
        </div>
    </div>
    @endforeach
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>

    <script>
        $('#check-all').change(function () {
            addClassWhenReload()
        })

        $(document).ready(function () {
            addClassWhenReload();
        })

        function addClassWhenReload() {
            if ($('#check-all').is(':checked')) {
                console.log("HAI");
<<<<<<< HEAD
                $('.checkbox').parent().parent().find('.voucher-container').addClass('selected')
                $('.checkbox').prop('checked', true)
            } else {
                console.log("TEST");
                $('.checkbox').parent().parent().find('.voucher-container').removeClass('selected')
=======
                $('.checkbox').parent().parent().find('.unit-identity-card-container').addClass('selected')
                $('.checkbox').prop('checked', true)
            } else {
                console.log("TEST");
                $('.checkbox').parent().parent().find('.unit-identity-card-container').removeClass('selected')
>>>>>>> 2ff941e7aacc56b823455c44ffa232204592604b
                $('.checkbox').prop('checked', false)
            }
        }

<<<<<<< HEAD
        $('.checkbox').change(function () {
            if ($(this).is(':checked')) {
                $(this).parent().parent().find('.voucher-container').addClass('selected')
            } else {
                $(this).parent().parent().find('.voucher-container').removeClass('selected')
=======
        $('.checkbox').change(function() {
            if ($(this).is(':checked')) {
                $(this).parent().parent().find('.unit-identity-card-container').addClass('selected')
            } else {
                $(this).parent().parent().find('.unit-identity-card-container').removeClass('selected')
>>>>>>> 2ff941e7aacc56b823455c44ffa232204592604b
            }
            // console.log();        
        })
    </script>
</body>

</html>