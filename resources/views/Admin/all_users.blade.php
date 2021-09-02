@extends('layouts.admin_master')
@section('content')

<div class="card-header">
    <i class="fas fa-table mr-1"></i>
    Users list
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    @if (Auth::user()->role == 'Admin')
                    <th>Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->role }}</td>
                        @if (Auth::user()->role == 'Admin')
                        <td>
                            <div class="d-inline-block">
                                <a href="{{ route('edit.users', $item->id) }}"
                                    style="height: 38px; padding-top: 8px;" class="btn btn-sm btn-info">Edit</a>
                            </div>
                            <div class="d-inline-block">
                                <form action="{{ route('delete.users', $item->id) }}" method="POST">
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


@endsection