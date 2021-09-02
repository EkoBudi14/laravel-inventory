<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Penjualan</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        Istana Knalpot
                        <small class="float-right">{{ $date }}</small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-7 invoice-col">
                    From
                    <address>
                        <strong>ISTANA KNALPOT </strong><br>
                        Jl.KH Samanhudi 32 CC (Pintu Besi) <br>
                        telp&nbsp;&nbsp;: 021 70980560 <br>
                        Hp &nbsp;&nbsp;: 08129050188 <br>
                        Jakarta Pusat
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ $customers->company }}</strong><br>
                        {{ $customers->name }} <br>
                        {{ $customers->address }}<br>
                        {{ $customers->phone }}<br>
                        {{ $customers->email }}<br>
                    </address>
                </div>
                <!-- /.col -->
                @foreach ($databarang -> take(1) as $item )
                <div class="col-sm-4 invoice-col">
                    <b>INVOICE #{{ $item->invoice_number }}</b><br>
                </div>
                @endforeach
                
                <!-- /.col -->
            </div>
            <!-- /.row -->



            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Exchaust Section</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                $totalAll=0;
                            ?>
                            @foreach ($databarang as $item)
                                <?php 
                                    $subtotal = $item->qty * $item->price;
                                ?>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->exhaust_section }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>@currency($item->price)</td>
                                    <td>@currency($subtotal)</td>
                                </tr>
                                <?php 
                                    $totalAll+= $subtotal;
                                ?>
                            @endforeach
                            
                            <tr>
                                <th colspan="6">
                                    Total
                                </th>
                                <td>@currency($totalAll)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    <p class="lead">ATTENTION !!!</p>
                    <p class="well well-sm shadow-none" style="margin-top: 10px;">
                        Payment using Giro / Check and Transfer please be addressed to:
                        BCA a/n Rudy Winarjo
                        A/C :889-003-887    
                    </p>
                </div>
            </div>
            <h5>Signature</h5>
            <div class="row">
                <div class="col-4">
                    <p>Prepared by</p><br><br><br><br>
                    <p>
                        Full name
                    </p>
                </div>
                <div class="row-4">
                    <p>Received by</p><br><br><br><br>
                    <p>
                        Full name
                    </p>
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('backend') }}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('backend') }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('backend') }}/assets/demo/datatables-demo.js"></script>
    <script src="{{ asset('js/jquery.repeater.min.js') }}"></script>
</body>

</html>
