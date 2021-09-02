@extends('layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Order
        </div>
        <div class="card-body">
            <div class="form-row">
                <div style="margin-left : 20px" class="col-md-2">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Customer Name</label>
                        <input class="form-control py-4" name="customer" type="text"  />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Customer Email</label>
                        <input class="form-control py-4" name="customer" type="text" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Company</label>
                        <input class="form-control py-4" name="customer" type="text" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Address</label>
                        <input class="form-control py-4" name="customer" type="text" />
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="small mb-1" for="inputFirstName">Phone No.</label>
                        <input class="form-control py-4" name="customer" type="text" />

                    </div>
                </div>
                <button style="margin-left: 100px; margin-top:22px; width: 100px; height: 50px" type="submit" class="btn btn-primary"> Order</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Stock Available</th>
                            <th>Years</th>
                            <th>Sale Price</th>
                            <th>Stok choose</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $row)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->category }}</td>

                                @if ($row->stock > '0')
                                    <td>{{ $row->stock }}</td>
                                @else
                                    <td>stockout</td>
                                @endif

                                <td>{{ $row->years }}</td>
                                <td>{{ $row->sales_unit_price }}</td>
                                {{-- <td>
                                    <a style="width: 60px; height: 38px" href="#" class="btn btn-sm btn-info">Edit</a>
                                    <a href="{{ 'purchase-products/' . $row->id }}" class="btn btn-sm btn-info">Purchase</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                </td> --}}
                                <td>
                                    <select name="" id="" class="form-control"></select>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
