<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{

    public function store(Request $request){
        $item = $request -> all();

        $insert = Product::create($item);
        if ($insert) {
            Alert::success('Success', 'Succesfully Add new Product');
        }

        return Redirect()->route('all.product');
    }

    public function allProduct(){
    	$products = Product::all();
    	return view('Admin.all_product',compact('products'));
    }

    public function availableProducts(){
        $products = Product::where('stock','>','0')->get();
        return view('Admin.available_products',compact('products'));
    }

    public function formData($id){
        $product = Product::find($id);
        
        return view('Admin.add_order',compact('product'));
    }

    public function purchaseData($id){
        $product = Product::find($id);
        return view('Admin.purchase_products',compact('product'));
    }

    public function storePurchase(Request $request){
        Product::where('name',$request->name)->update(['stock' => $request->stock + $request->purchase]);
        return Redirect()->route('all.product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.edit_product', compact('product'));
    }

    public function update(Request $request, $id) 
    {
        $data = $request -> all();
        $item = Product::findOrFail($id);
        $item->update($data);
        return redirect()->route('all.product')->with('success', 'Product Was Successfully Edited');
    }

    public function destroy($id) 
    {   
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('all.product')->withSuccess('Product was deleted');
    }
}
