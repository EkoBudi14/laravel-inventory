@extends('layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Create Invoice
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->company }}</td>
                                <td>{{ $row->address }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>

                                    {{-- <!-- <a href="{{ 'add-order/' . $row->id }}" class="btn btn-sm btn-info">Order</a> --> --}}
                                 <div class="d-inline-block">
                                        <a href="javascript:;" onclick="ShowModalSum({{ $row->id }})"
                                            style="height: 38px; padding-top: 8px;" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">Create Invoice</a> 
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('create.invoice') }}" >
                <div class="modal-body">
                    <label for=""> Enter the number of types of goods</label>
                    <input type="number" class="form-control" name="jumlah_barang">
                    <input type="hidden" id="CustomerID" name="id">
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

