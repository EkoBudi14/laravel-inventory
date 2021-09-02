@extends('layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            Customers List
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
                            @if (Auth::user()->role == 'Admin')
                            <th>Action</th>
                            @endif
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
                                @if (Auth::user()->role == 'Admin')
                                <td>

                                    <div class="d-inline-block">
                                        <a href="{{ route('edit.customers', $row->id) }}"
                                            style="height: 38px; padding-top: 8px;" class="btn btn-sm btn-info">Edit</a>
                                    </div>
                                    <div class="d-inline-block">
                                        <form action="{{ route('delete.customers', $row->id) }}" method="POST">
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
