<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\InvoicePayment;
use App\Models\InvoiceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class InvoiceController extends Controller
{
    public function store(Request $request){
    	
    	$data=new Invoice;
        $data->customer_name= $request->customer;
    	$data->customer_mail= $request->email;
        $data->company = $request->company;
        $data->address = $request->address;
        // $data->item = $request->item;
    	$data->product_name = $request->name;
    	$data->price = $request->price;
    	$data->quantity = $request->quantity;
        $data->total = $request->total;
        $data->payment = $request->payment;
        $data->due = $request->total - $request->payment;
        $data->save();

        //order_track
        // $productCode = Product::where('name',$request->name)->first();
        // $data2=new Order;
        // $data2->email= $request->email;
        // $data2->product_code = $productCode->product_code;
        // $data2->product_name = $request->name;
        // $data2->quantity = $request->quantity;
        // $data2->order_status = 1;
        // $data2->save();

        //customer_track
        $customer = Customer::where('email', '=', $request->email)->first();
        if($customer === null){
            $data3=new Customer;
            $data3->name= $request->customer;
            $data3->email= $request->email;
            $data3->company = $request->company;
            $data3->address = $request->address;
            $data3->phone = $request->phone;
            $data3->save();
        }

        // $products = DB::table('products')->where('category',$request->item)->first();
        // $mainqty = $products->stock;
        // $nowqty = $mainqty - $request->quantity;

        // DB::table('products')->where('name',$request->name)->update(['stock' => $nowqty]);
        // Order::where('email',$request->email)->update(['order_status'=>'1']);

        return redirect()->route('all.invoices');

        // return view('Admin.invoice_details',compact('data'));


        // return Redirect()->route('add.invoice');
    }

    public function formData($id){
        $order = Order::where('id',$id)->first();
        $product = Product::where('product_code',$order->product_code)->first();
        $customer = Customer::where('email',$order->email)->first();
        return view('Admin.add_invoice',compact('order','product','customer'));
    }

    public function newformData(){
        $products = Product::all();
        $customers = Customer::all();
        return view('Admin.new_invoice',compact('products','customers'));
    }


    public function allInvoices(){
        $invoices = Invoice::all();
        return view('Admin.all_invoices',compact('invoices'));
    }

    public function soldProducts(){
    //     $products = Invoice::select('product_name', Invoice::raw("SUM(quantity) as count"))
    //     ->groupBy(Invoice::raw("product_name"))->get();
    //    // ?print_r($products);
        return view('Admin.print_sale_of_goods');
    }

    public function delete(){
        Invoice::truncate();
    }

    public function newInvoice(Request $request) {
        // dd($request);
        // dd($id);
        $customer = $request->input('id');
        $barang = $request->input('jumlah_barang');
        $products = Product::all();
        $customers = Customer::findOrFail($customer);

        return view('Admin.create_invoice')->with([
            'customer' => $customer,
            'barang' => $barang,
            'products' => $products,
            'customers' => $customers
        ]);
        // return view('Admin.create_invoice', compact('products','customers','barang'));
    }

    public function printInvoiceByDate() {
        return view('Admin.print_invoice_by_date');
    }

    public function invoiceByDate($startDate, $endDate) {
        $date = Carbon::today()->toDateString();
        $invoiceOrder = InvoiceOrder::whereBetween('date',[$startDate, $endDate])->get();
        return view('Admin.print_list_invoice', compact('invoiceOrder','date'));
    }

    public function printStockByDate() {
        return view('Admin.print_sale_of_goods');
    }

    public function stockByDate($startDate, $endDate) {
        $date = Carbon::today()->toDateString();
        $invoiceStockOrder = InvoiceOrder::whereBetween('date',[$startDate, $endDate])->get();
        return view('Admin.print_list_stock', compact('invoiceStockOrder','date'));
    }

    public function getProduct($name){
        $data = Product::where('name',$name)->get();
        // dd($data);
        //  $data = User::where('EmployeeID',$id)->get();
        return response()->json(['data' => $data]);
    }


        // public function Jumlah_Barang(Request $request){
        //     // $data = Product::where('id',$id)->get();
        //     // dd($data);
        //     //  $data = User::where('EmployeeID',$id)->get();
        //     // return response()->json(['data' => $data]);
        // }

    public function invoiceBydateasboard() {
        return view('Admin.print_invoice_by_date');
    }

}
