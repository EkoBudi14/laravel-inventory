@extends('layouts.admin_master')
@section('content')

    {{-- {{  route('update.customers',$customers->id)  }} --}}
    <div class="card-header" style="margin-top: -22px; margin-bottom: 20px">
        <i class="fas fa-table mr-1"></i>
        Edit Products
    </div>
    <div class="container">
        <form action="{{ route('update.product', $product->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="exampleInputName1">Code</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Code" name="product_code"
                    value=" {{ $product->product_code }}">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" class="form-control" id="exampleInputtxt1" name="name" placeholder="Enter Name"
                    value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Category</label>
                <input type="text" class="form-control" id="exampleInputTxt1" name="exhaust_section"
                    placeholder="Enter Category Name" value=" {{ $product->exhaust_section }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Stock</label>
                <input type="text" class="form-control" id="exampleInputTxt1" name="stock" placeholder="Enter Stock"
                    value=" {{ $product->stock }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Years</label>
                <input type="text" class="form-control" id="exampleInputTxt1" placeholder="Enter years" name="years"
                    value=" {{ $product->years }}">
            </div>
            <div class="form-group">
                <label for="exampleInputTxt1">Sale Price</label>
                <input type="text" class="form-control" name="price" id="exampleInputTxt1" placeholder="Enter years"
                    value=" {{ $product->price }}">
            </div>
            <button value="Save" type="submit" class="btn btn-primary">Edit</button>
        </form>
    </div>

@endsection
