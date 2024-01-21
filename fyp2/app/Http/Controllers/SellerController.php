<?php

  

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



  

class SellerController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('auth');

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function addproductseller()

    {
       
        return view('seller.addproductseller');
    } 

    
    public function storeproductseller(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        // Assuming logo is an image file (2MB limit)
    ]);

    // Retrieve form data
    $name = $request->input('name');
    $description = $request->input('description');
    $orignal_price = $request->input('orignal_price');
    $discount_price = $request->input('discount_price');
    $type = $request->input('type');
    $mag_date = $request->input('mag_date');
    $exp_date = $request->input('exp_date');
    $stock = $request->input('stock');
    $vendor_id = Auth::user()->id;
    $status = 0;

    // Handle file upload
    $image = null;
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = 'logos/' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public', $filename);
        $image = $filename;
    }

    // Insert data into the 'products' table using DB facade
    DB::table('products')->insert([
        'name' => $name,
        'description' => $description,
        'orignal_price' => $orignal_price,
        'discount_price' => $discount_price,
        'type' => $type,
        'mag_date' => $mag_date,
        'exp_date' => $exp_date,
        'stock' => $stock,
        'vendor_id' => $vendor_id,
        'status' => $status,
        'image' => $image,
        'created_at' => now(),  
        'updated_at' => now(),  
    ]);

    // Retrieve all sellers
  

    $allproducts = DB::table('products')->where('vendor_id' , Auth::user()->id)->get();
    return view('seller.listproductseller', ['allproducts' => $allproducts]);
}


public function listproductseller()
{
    $allproducts = DB::table('products')->where('vendor_id' , Auth::user()->id)->get();
    return view('seller.listproductseller', ['allproducts' => $allproducts]);
} 


public function editproductseller(Request $request)
    {
        
        $productrecord = DB::table('products')->where('id' , $request->id)->first();
        return view('seller.editproductseller', ['productrecord' => $productrecord]);
    } 



    
    public function updateproductseller(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            // Add validation rules for other fields as needed
        ]);
    
        // Retrieve the product record
        $seller = DB::table('products')
            ->where('id', $request->input('id'))
            ->first();
    
        if (!$seller) {
            // Handle the case where the record is not found
            // You can return an error response or redirect to an error page.
        }
    
        // Update the seller's attributes with the form data
        $seller->name = $request->input('name');
        $seller->description = $request->input('description');
        $seller->orignal_price = $request->input('orignal_price');
        $seller->discount_price = $request->input('discount_price');
        $seller->type = $request->input('type');
        $seller->mag_date = $request->input('mag_date');
        $seller->exp_date = $request->input('exp_date');
        $seller->stock = $request->input('stock');
        $seller->onsale = ($seller->discount_price < $seller->orignal_price) ? 1 : 0;
    
        if ($request->hasFile('image')) {
            // Handle image update
            $file = $request->file('image');
            $filename = 'logos/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $seller->image = $filename;
        }
    
        // Update the record
        DB::table('products')
            ->where('id', $request->input('id'))
            ->update((array) $seller);
    
        $allproducts = DB::table('products')
            ->where('vendor_id', Auth::user()->id)
            ->get();
    
        return view('seller.listproductseller', ['allproducts' => $allproducts]);
    }
    


//orders


public function mydeliveredorder()
{
    $deliveredorder = Orderdetail::where('delivery' , 1)->where('sellerid' , Auth::user()->id)->latest()->get();
    return view('seller.deliveredorder', ['deliveredorder' => $deliveredorder]);
} 

public function mypendingorder()
{
    $pendingorder = Orderdetail::where('delivery' , 0)->where('sellerid' , Auth::user()->id)->latest()->get();
    return view('seller.pendingorder', ['pendingorder' => $pendingorder]);
} 



public function myupdateDelivery($id)
    {
        $order = Orderdetail::find($id);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Update the delivery status to 1
        $order->update(['delivery' => 1]);

        return response()->json(['message' => 'Order delivered successfully']);
    }



 

}