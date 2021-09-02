@extends('layouts.admin_master')
@section('content')

    {{-- {{  route('update.customers',$customers->id)  }} --}}
    <div class="card-header" style="margin-top: -22px; margin-bottom: 20px">
        <i class="fas fa-table mr-1"></i>
        Edit users
    </div>
    <div class="container">
        <form action="{{ route('update.users', $users->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" id="exampleInputName1"
                    placeholder="Enter Name" name="name" value=" {{ $users->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputtxt1" placeholder="Email"
                    value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Role</label>
                <input type="text" class="form-control" id="exampleInputTxt1"
                    placeholder="Enter Company Name" name="company" value=" {{ $users->role }}">
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

@endsection
