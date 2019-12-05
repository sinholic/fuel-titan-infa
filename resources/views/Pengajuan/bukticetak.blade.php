<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <form action="" method="">

                @csrf

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Print Bukti Pengajuan Hutang Solar</h3>
                    </div>

                    <div class="card-body">

                        @if($errors->any())
                        <div class="alert alert-danger">
                            {{implode('', $errors->all(':message'))}}
                        </div>
                        @endif

                        <div class="form-group">
                            <label>NO Pengajuan</label><br>
                            <label for="">{{$pengajuan->no_pengajuan}}</label><br>
                        </div>

                        <div class="form-group">
                            <label for="">Supplier</label><br>
                            <label for="">{{$pengajuan->supplier->company_name}}</label>
                        </div>

                        <div class="form-group">
                            <label>Lokasi Pengambilan</label><br>
                            <label for="">{{$pengajuan->fixstation->nama_lokasi}}</label>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pengambilan</label><br>
                            <label class="">{{$pengajuan->taking_date}}</label>
                        </div>

                        <div class="form-group">
                            <label>Qty</label><br>
                            <label>{{$pengajuan->qty}}</label>
                        </div>

                        <div class="form-group">
                            <label>Remark</label><br>
                            <label for="">{{$pengajuan->remark}}</label>
                        </div>

                        <div class="form-group">
                            <label>Peminjam</label><br>
                            <label for="">{{$pengajuan->borrower->company_name}}</label>
                        </div>

                    </div>

                    <div class="card-footer">
                    </div>

                </div>

            </form>

        </div>
    </div>
</body>

</html>