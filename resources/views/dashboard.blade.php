@extends('layouts.admin_master')

@section('content')

    <main>
        <div class="container">
            <h1 class="mt-4">Welcome, {{ Auth::user()->name }}</h1>
            <br>
            <div class="row justify-content-center display:block">
                <div class="col-xl-4 col-md-3">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Stock</div>  
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('all.product') }}">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-3">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Sold Products</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('sold.products') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-3">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Invoice</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ route('invoiceBydateasboard.invoice') }}">View
                                Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            {{-- <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    List of Workers
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $dasboardUser)
                                    <tr>
                                        <td>{{ $dasboardUser->name }}</td>
                                        <td>{{ $dasboardUser->email }}</td>
                                        <td>{{ $dasboardUser->role }}</td>
                                    </tr>
                                @endforeach
                                {{ $errors }}
                            </tbody>
                        </table>
                    </div>
                </>
            </div> --}}
        </div>
    </main>
@endsection
