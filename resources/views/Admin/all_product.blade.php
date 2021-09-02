@extends('layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Products in Stock
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered rounded-lg" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Exhaust Section</th>
                            <th>Stock</th>
                            <th>Come in Date</th>
                            <th>Years</th>
                            <th>Sale Price</th>
                            @if (Auth::user()->role == 'Admin')
                            <th>Action</th>
                                
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $row)
                            <tr>
                                <td>{{ $row->product_code }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->exhaust_section }}</td>
                                @if ($row->stock > '0')
                                    <td>{{ $row->stock }}</td>
                                @else
                                    <td>stockout</td>
                                @endif
                                
                                <td>{{ $row->updated_at->format('Y-m-d') }}</td>

                                <td>{{ $row->years }}</td>
                                <td>@currency($row->price)</td>
                                @if (Auth::user()->role == 'Admin')
                                    <td>

                                        {{-- <a href="{{ 'purchase-products/'.$row->id }}" class="btn btn-sm btn-info">Purchase</a> --}}
                                        <div class="d-inline-block">
                                            <a href="{{ route('edit.product', $row->id) }}"
                                                style="height: 38px; padding-top: 8px;" class="btn btn-sm btn-info">Edit</a>
                                        </div>
                                        <div class="d-sm-inline-block">
                                            <form class="display-inlie" action="{{ route('delete.product', $row->id) }}"
                                                method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
