<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Print Voucher</title>
  </head>
  <body>
<a href="#" class="btn btn-primary" onclick="window.print();">Print</a>

<div class="container">
    <div class="row">
        <div class="col">
            <table border="3">
                <tr>
                    <th rowspan="2" colspan="2" class="text-center"><b>UNIT IDENTITY CARD</b></th>
                    <th colspan="2"></td>
                </tr>
                <tbody>
                @foreach($voucher  as $s)
                    @php $string = 
                       "Voucher: $s->code_number, 
                        Qty: $s->qty, 
                        Nama: $s->owner,
                        Expired: $s->expired_date"
                    @endphp
                <tr>
                    <td>{!! QrCode::size(200)->generate($string); !!}</td>
                    <td>Jumlah:  {{$s->qty}} <br> Owner: {{$s->owner}} <br> Kadaluarsa: {{$s->expired_date}}</td>
                </tr>
                 @endforeach
                </tbody>
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
