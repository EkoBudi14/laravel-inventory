@extends('layouts.admin_master')
@section('content')

    {{-- {{  route('update.customers',$customers->id)  }} --}}
    <div class="card-header" style="margin-top: -22px; margin-bottom: 20px">
        <i class="fas fa-table mr-1"></i>
        Edit Customers
    </div>
    <div class="container">
        <form action="{{ route('update.customers', $customers->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" id="exampleInputName1"
                    placeholder="Enter Name" name="name" value=" {{ $customers->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputtxt1" placeholder="Email"
                    value="{{ $customers->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Company</label>
                <input type="text" class="form-control" id="exampleInputTxt1"
                    placeholder="Enter Company Name" name="company" value=" {{ $customers->company }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Address</label>
                <input type="text" class="form-control" id="exampleInputTxt1"
                    placeholder="Enter Address" name="address" value=" {{ $customers->address }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPhone1">Phone</label>
                <input type="text" class="form-control" id="exampleInputPhone1"
                    placeholder="Enter Phone Number" name="phone" value=" {{ $customers->phone}}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

@endsection
