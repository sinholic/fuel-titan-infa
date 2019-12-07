<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Bukti Piutang Hutang</title>
    <style>
          @media print {

            .unit-identity-card-container,
            .table-cont,
            .float-left,
            .print {
                display: none;
                visibility: hidden;
            }
          }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="">

                @csrf

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Print Bukti Piutang Solar</h3>
                    </div>

                    <div class="card-body">
                        <a href="#" class="btn btn-primary print" style="float: right" ; onclick="window.print();">Print</a>

                        <div class="form-group">
                            <label>NO Piutang Solar</label><br>
                            <label for="">{{$piutang->no_piutang}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="">Qty Piutang Solar</label><br>
                            <label for="">{{$piutang->qty_piutang}}</label>
                        </div>

                        <div class="form-group">
                            <label>Peminjam</label><br>
                            <label for="">{{$piutang->peminjam}}</label>
                        </div>

                        <div class="form-group">
                            <label>Status Piutang</label><br>
                            <label for="">{{$piutang->status_piutang}}</label>
                        </div>

                    </div>

                    <!-- <div class="card-footer">
                    </div> -->

                </div>

            </form>

        </div>
    </div>
</body>

</html>