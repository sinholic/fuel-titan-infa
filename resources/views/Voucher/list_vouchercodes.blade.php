<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Lists Voucher</title>

</head>

<body>
    <a href="#" class="btn btn-primary" style="float: right" ;
        onClick="javascript:window.close('','_parent','');">Close</a>

    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Owner</th>
                            <th>Serial Number</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($voucher->vouchercodes as $vouchercode)
                        @php $string =
                        "Voucher: $vouchercode->code_number,
                        Qty : $voucher->qty,
                        Owner: $voucher->voucherowner->vendor,
                        Expired: $voucher->expired_date"
                        @endphp
                        <tr>
                            <td>{{ $voucher->voucherowner->vendor_name }}</td>
                            <td>{{ $vouchercode->serial_number }}</td>
                            <td>{{ $vouchercode->used ? "Used" : $vouchercode->rejected ? "Rejected" : "Not Used / Rejected" }}
                            </td>
                            <td>
                                @if (!$vouchercode->rejected && !$vouchercode->used)
                                    <a onClick="return confirm('Yakin ingin mereject voucher ini?')" data-toggle="tooltip"
                                    href="/voucher/reject/{{ $voucher->id }}/{{ $vouchercode->id }}" title="Reject" class="btn btn-danger">
                                        <i class="fa fa-trash nav-icon"></i> Reject
                                    </a>
                                @else
                                    No action needed
                                @endif
                                {{-- <a href="http://" class="btn btn-danger"></a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>