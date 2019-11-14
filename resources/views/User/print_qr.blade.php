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
    </style>
</head>

<body>
    <a href="#" class="btn btn-primary" style="float: right" ; onclick="window.print();">Print</a>
    @foreach($users as $user)
    @php
    $userLevel = isset($user->status) ? $user->status->nama : "";
    @endphp
    @php $string =
    "User Nama: $user->name,
    User ID: $user->id,
    Level: $userLevel
    "
    @endphp
    <div style="height:40mm; width:40mm; border:1px solid black; margin-bottom: 5mm;margin-left:5mm;margin-top:5mm;">
        {{-- <div style="text-transform:uppercase;text-align:center;font-weight:bold;">unit identity card</div> --}}
        <div style="width:50%;float:left;">
            {!! QrCode::size(50)->margin(0)->generate($string); !!}
        </div>
        <div style="float:left;width:50%;text-align:center;">
            
        </div>
    </div>
    @endforeach

</body>

</html>