@extends('layouts.admin_master')
@section('content')

<div class="form-group">
    <p align="center"><b>Invoice List</b></p>
    <table class="static" align="center" rules="all" border="1px" style="width : 95%">
        <tr>
            <th>Date</th>
            <th>Invoice Number</th>
            <th>Name Customer</th>
            <th>Company</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            {{-- <th>Total Payment</th> --}}
        </tr>
        <?php 
            $totalAll=0;
        ?>
        @foreach ( $invoiceOrder as $item)
        <?php 
            $subtotal = $item->qty * $item->price;
        ?>
            <tr>
                <td>{{ $item->date }}</td>
                <td>INVOICE#{{ $item->invoice_number }}</td>
                <td>{{ $item->customer->name }}</td>
                <td>{{ $item->customer->company }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->qty }}</td>
                <td>@currency($item->price)</td>
                <td>@currency($subtotal) </td>
                {{-- <th>{{ $item->invoicePayment->total_payment }}</th> --}}
            </tr>
            <?php 
                $totalAll+= $subtotal;
            ?>
        @endforeach
        <tr>
            <th colspan="7">
                Total
            </th>
            <td>@currency($totalAll)</td>
        </tr>
    </table>
</div>
<script>
    window.addEventListener("load", window.print());

</script>

@endsection