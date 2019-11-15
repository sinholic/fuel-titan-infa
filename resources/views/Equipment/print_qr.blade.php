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
        table tr{
            margin: 0;
            line-height: 1.2;
        }
    </style>
</head>

<body>
    <a href="#" class="btn btn-primary" style="float: right" ; onclick="window.print();">Print</a>
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
    <div style="height:55mm; width:86.6mm; border:1px solid black; margin-bottom: 5mm;margin-left:5mm;margin-top:5mm;">
        <div style="text-transform:uppercase;text-align:center;font-weight:bold;">unit identity card</div>
        <div style="width:50%;float:left;">
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
        <div style="float:left;width:50%;text-align:center;">
            {!! QrCode::size(160)->margin(0)->generate($string); !!}
            <serial-number>{{ $equipment->cards->count() > 0 ? $equipment->cards->last()->cardnumber : "" }}</serial-number>
        </div>
    </div>
    {{-- <tr>
        <td style="margin-top: 30px" colspan=2>
            <p>Number: {{$equipment->equipment_number}}</p>
            <p>Name: {{$equipment->equipment_name}}</p>
            <p>Category: {{$category}}</p>
            <p>Owner: {{$owner}}</p>
            <hr>
        </td>
    </tr> --}}
    @endforeach

</body>

</html>