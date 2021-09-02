@extends('layouts.admin_master')
@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create New Invoice</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        ISTANA KNALPOT <br>
                                        Jl.KH Samanhudi 32 CC (Pintu Besi) <br>
                                        telp&nbsp;&nbsp;: 021 70980560 <br>
                                        Hp &nbsp;&nbsp;: 08129050188
                                        Jakarta Pusat
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        Jakarta, <br>
                                        Customer&nbsp;&nbsp;: {{ $customers->name }} <br>
                                        Phone&nbsp;&nbsp; : {{ $customers->phone }} <br>
                                        Email&nbsp;&nbsp; : {{ $customers->email }}<br>
                                        Address &nbsp;&nbsp;: {{ $customers->address }}<br>
                                        
                                    </div>
                                </div>
                            </div>
                        <form class="display-inlie" action="{{ route('print-invoice.store', $customers->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="barang" value="{{ $barang }}">
                            <input type="hidden" name="customers_id" value="{{ $customers->id }}">
                            <input type="hidden" name="date">
                            <input type="hidden" name="subtotal">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Product Code</th>
                                        <th>Exhaust Section</th>
                                        <th>Years</th>
                                        <th>price</th>
                                        <th>qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < $barang; $i++)
                                    <tr>
                                        
                                        <td>
                                            <select name="name[]" id="drop_{{ $i }}" onchange="getdetail({{ $i }})" class="form-control">
                                                <option value=""> -- Choose Product  --</option>
                                                @foreach ($products as $item)
                                                <option value="{{ $item -> name }}">{{ $item->name }}</option> 
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="code[]" id="product_code_{{ $i }}">
                                        </td>
                                        
                                        <td>
                                            <input class="form-control" type="text" name="exhaust_section[]" id="exhaust_section_{{ $i }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="text" name="years[]" id="years_{{ $i }}">
                                        </td>
                                        <td>
                                        <input class="form-control" type="text" name="price[]" id="price_{{ $i }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="qty[]" id="qty_{{ $i }}">
                                        </td>
                                    </tr>
                                    @endfor
                                    
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary"> Create Invoice </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

{{-- @section('script')
<script>

</script>

@endsection --}}


{{-- <div class="file-repeater">
    <div data-repeater-list="attendanceDetail" >
        <div data-repeater-item style="margin-top:6px; " class="d-inline">
         
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for=""> <H5> Nama Barang</H5></label>
                    <select name="name" id="drop" class="form-control">
                        <option> -- Pilih Barang -- </option>
                        @foreach ($products as $item)
                            <option value="{{ $item->price }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-5">
                        <input type="text" class="form-control" name="price" id="tes">
                </div>
                <div class="form-group col-lg-1">
                    <div class="input-group input-group-merge">
                        <button type="button" data-repeater-delete
                            class="btn form-control btn-info mr-1 btnremoverepeater"><i
                                class="fas fa-backspace"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" data-repeater-create class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add Task
    </button> <br>
</div> --}}
