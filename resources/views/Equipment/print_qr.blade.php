<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Print QR Equipment</title>
    <style>
        p {
            margin-left: 2mm;
        }

        serial-number {
            font-size: 10px;
            position: relative;
            bottom: 5mm;
        }

        table tr {
            margin: 0;
            line-height: 1.2;
        }

        .unit-identity-card-container {
            height: 55mm;
            width: 86.6mm;
            border: 1px solid black;
            margin-bottom: 5mm;
            margin-left: 5mm;
            margin-top: 5mm;
        }

        .unit-identity-card-container .title {
            text-transform: uppercase;
            text-align: center;
            font-weight: bold;
        }

        .left-container {
            width: 50%;
            float: left;
        }

        .right-container {
            float: left;
            width: 50%;
            text-align: center;
        }
        .table-cont {
            margin-left:20px;margin-bottom:5mm;
        }

        .float-left{
            float:left;
        }
        @media print {
            .unit-identity-card-container,
            .table-cont,
            .float-left {
                display: none;
                visibility: hidden;
            }

            .selected {
                display: block;
                visibility: visible;
            }
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
        @foreach($equipments as $equipment)
        @php
        $category = $equipment->equipmentcategory->nama;
        $owner = $equipment->equipmentowner->vendor_name;
        @endphp
        @php $string =
        "Equipment Number: $equipment->equipment_number,
        Equipment Name: $equipment->equipment_name,
        Category: $category,
        Owner: $owner
        "
        @endphp
            <div>
                <div class="float-left">
                    <input type="checkbox" class="checkbox" checked name="" id="">
                </div>
                <div class="unit-identity-card-container {{ $loop->first ? "" : "" }}">
                    <div class="title">unit identity card</div>
                    <div class="left-container">
                        <table style="margin-left:2mm;margin-top:3mm">
                            <tr>
                                <td>Owner</td>
                                <td>:</td>
                                <td>{{ $equipment->equipmentowner->vendor_inisial }}</td>
                            </tr>
                            <tr>
                                <td>Type Eq.</td>
                                <td>:</td>
                                <td>{{ $equipment->equipmentcategory->nama }}</td>
                            </tr>
                            <tr>
                                <td>Tank Cap.</td>
                                <td>:</td>
                                <td>{{ $equipment->fuel_capacity }}</td>
                            </tr>
                            <tr>
                                <td>No. Eq</td>
                                <td>:</td>
                                <td>{{ $equipment->equipment_number }}</td>
                            </tr>
                            <tr></tr>
                            <tr></tr>
                            <tr>
                                <td colspan="3">

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="right-container">
                        {!! QrCode::size(160)->margin(0)->generate($string); !!}
                        <serial-number>{{ $equipment->cards->count() > 0 ? $equipment->cards->last()->cardnumber : "" }}
                        </serial-number>
                    </div>
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
                $(this).parent().parent().find('.unit-identity-card-container').addClass('selected')
                $('.checkbox').prop('checked', true)
            } else {
                console.log("TEST");
                $(this).parent().parent().find('.unit-identity-card-container').removeClass('selected')
                $('.checkbox').prop('checked', false)
            }
        }

        $('.checkbox').change(function(){
            if ($(this).is(':checked')) {
                $(this).parent().parent().find('.unit-identity-card-container').addClass('selected')
            }else{
                $(this).parent().parent().find('.unit-identity-card-container').removeClass('selected')
            }
            // console.log();        
        })
    </script>
</body>

</html>