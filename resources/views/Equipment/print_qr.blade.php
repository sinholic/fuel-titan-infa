<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Print QR Equipment</title>
    <style type="text/css">
        table.one {
            border-collapse:separate;
            border:solid black 1px;
            border-radius:6px;
            -moz-border-radius:6px;
        }

        td.one, tr.one {
            border-left:solid black 1px;
            border-top:solid black 1px;
        }

        tr.one {
            background-color: white;
            border-top: none;
        }

        td:first-child, tr:first-child {
            border-left: none;
            margin-top: 30px;
        }

        /* .qr{
            display: block;
            margin-left: -3;
        } */

        h4 {
        font-size: 25px;
        }

        p {
        font-size: 15px;
        left: 25px;
        margin: 0;
        }
    </style>
  </head>
  <body>
<a href="#" class="btn btn-primary" style="float: right"; onclick="window.print();">Print</a>

<div class="container">
    <div class="row">
        <div class="col">
            <table border="0" class="one" style="width:40mm">
                {{-- <td style="width: 40mm; height: 40mm;"> --}}
                    
                    {{-- <table> --}}
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
                        <tr>
                            <td style="margin-left: -6px; height:40mm">{!! QrCode::size(150)->margin(0)->generate($string); !!}</td>
                        </tr>
                        <tr>
                            <td style="margin-top: 30px" colspan=2>
                                <p>Number: {{$equipment->equipment_number}}</p>
                                <p>Name: {{$equipment->equipment_name}}</p>
                                <p>Category: {{$category}}</p>
                                <p>Owner: {{$owner}}</p>
                                <hr >
                            </td>
                        </tr>
                    @endforeach
                    {{-- </table> --}}
		
		        </td>
            </table>
        </div>
    </div>
</div> 

   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
