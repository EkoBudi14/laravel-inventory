<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\InvoiceOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class PrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->qty);

        $date = Carbon::today()->toDateString();
        $customers = $request->customers_id;
        $invoicenumber = 1;
        $jumlah = $request->barang;

        // $qtys = $request->$qty;
        // $prices = $request->$price;

        // $total = ($qty * $price);

        $select = DB::table('invoice_order')->where('customers_id',$customers)
                                        ->orderBy('invoice_number','desc')
                                        ->first();

        // dd($select);

        
    if ($select != null) {
        $invoicenumber = $select->invoice_number += 1;
    }
    
        // dd($invoicenumber);
    $arraytotal = [];
    $totalpayment = 0;
    $totalall = 0;
        // $data = $request->all();
    for ($p=0; $p < $jumlah ; $p++) { 
        $arraytotal[] = [
            $totalpayment = $request->price[$p] * $request->qty[$p],
            $totalall += $totalpayment,
            
        ];
    }
    
    $sumall = $totalall;

    
    //    dump($sumall);
    //    dump($totalall);
    //    dump($discount);
    //    dd($arraytotal);

    DB::table('invoice_payment')->insert([
        'invoice_number' => $invoicenumber,
        'customers_id' => $request->customers_id,
        'total_payment' => $sumall,
    ]);
    
        
        // dd($totalpayment);
         //     $subtotal = $item->qty * $item->price;
            // $totalAll+= $subtotal;
        $array = [];

        for ($i=0; $i < $jumlah ; $i++) { 

            // $qtys = $request-> qty;
            // $prices = $request->price;
            // $subtotal = ($qtys * $prices);

            $array[] = [
                    // 'subtotal' => $subtotal,
                    'date' => $date,
                    'invoice_number' => $invoicenumber,
                    'customers_id' => $request->customers_id,
                    'code' => $request->code[$i],
                    'name' => $request->name[$i],
                    'exhaust_section' => $request->exhaust_section[$i],
                    'years' => $request->years[$i],
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i],
                    ];
            $Product = new Product;
            $Product->where('product_code', '=', $request->code[$i])->decrement('stock', (int)$request->qty[$i]);
            $Product->update();
        }

        // dd($request->qty);

        // $Product = new Product;
        // $Product->where('product_code', '=', $request->code)->decrement('stock', $request->qty);
        // $Product->update();
        
        // dd($Product);


        // dd($array);

        InvoiceOrder::insert($array);

        $databarang = DB::table('invoice_order')->where('invoice_number',$invoicenumber)
        ->where('customers_id',$customers)
        ->get();

        $customers = DB::table('customers')->where('id',$customers)->first();

        return view('Admin.print_pdf')->with([
            'databarang' => $databarang,
            'date' => $date,
            'customers' => $customers,
        ]);

        
        // foreach ($databarang as $item ) {
            
        //     $subtotal = $item->qty * $item->price;
        //     // $totalAll=0;
        //     // $totalAll+= $subtotal;
        //     // $totalpayment = (2/100) * $totalAll;
        //     dd($subtotal);
        // }

      


        // DB::table('invoice_order')->insert([
        //     'code' => $request->code[],
        //     'name' => $request->name[],
        //     'exhaust_sectiond' => $request->exhaust_sectiond[],
        //     'years' => $request->years[],
        //     'qty' => $request->qty[],
        //     'price' => $request->price[],
        // ]);

        // $insert = InvoiceOrder::create($data);

        // dd($insert);        // $data = Product::all();
        
        // dd($data);
        // $itemsid = $request->id;

        // $total = count($itemsid);

        // // dd($total);
        // $data = $request->all();
        // for($i = 0 ; $i < $total; $i++){
        //     $insert =  InvoiceOrder::create($data);
        // }
        // dd($itemsid);
        // foreach($request->id as $id){
        //     $order = DB::table('InvoiceOrder')->insert([
        //         'code' => $id['product_code'],
        //         'Name' => $id['name'],
        //         'Exhaust_Sectionde' => $id['exhaust_section'],
        //         'Years' => $id['years'],
        //     ]);
        // }

        // $data = foreach($request->id as $id){
        //     $order = DB::table('InvoiceOrder')->insert([
        //         'code' => $request->product_code,
        //         'Name' => $request->name,
        //         'Exhaust_Sectionde' => $request->exhaust_section,
        //         'Years' => $request->years,
        //     ]);
        // }
        // dd($data);
        // $customers = Customer::findOrFail();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function getProduct(){
    //     $data = ->where('EmployeeID',$id)->get();
    //     //  $data = User::where('EmployeeID',$id)->get();
    //      return response()->json(['data' => $data]);
    // }
}
