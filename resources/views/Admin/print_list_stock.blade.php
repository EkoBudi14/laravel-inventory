@extends('layouts.admin_master')
@section('content')

    <div class="form-group">
        <p align="center"><b>Sale Of Goods</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width : 95%">
            <tr>
                <th>No.</th>
                <th>Code product</th>
                <th>Name product</th>
                <th>Exhaust Section</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Invoice Number</th>
            </tr>
            <?php
                    $no = 1;
                ?>
            @foreach ($invoiceStockOrder as $item)
                
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->exhaust_section }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>INVOICE#{{ $item->invoice_number }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <script>
        window.addEventListener("load", window.print());

    </script>

@endsection
