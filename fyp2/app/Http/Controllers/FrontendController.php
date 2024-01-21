<?php

  

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use App\Models\Orderdetail;
use App\Models\Review;
use App\Models\Marketing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
  

class FrontendController extends Controller

{

  

  

    public function vendordetails(Request $request)
    {
        $promo = Marketing::where('status', 1)->where('exp_on', '>', now())->get();
        $vendordetails = User::where('id', $request->id)->first();
        $allproducts = DB::table('products')->where('vendor_id' , $request->id)->where('status' , 1)->get();
        return view('frontend.vendor_details', compact('vendordetails', 'allproducts', 'promo'));
    } 

    
    public function singleproduct(Request $request)
    {
        $promo = Marketing::where('status', 1)->where('exp_on', '>', now())->get();
        $allproducts = DB::table('products')->where('status' , 1)->get();
        $singleproduct = DB::table('products')->where('id' , $request->id)->first();

        $feedback = Review::where('prodid', $request->id)->where('status' , 1)->get();
        return view('frontend.singleproduct', compact('singleproduct', 'allproducts', 'feedback', 'promo'));
    } 


    
    public function addtocart(Request $request)
    {
        
       
    
        $orderDetail = Orderdetail::create([
            
            'userid' => Auth::user()->id,
            'prodid' => $request->prodid,
            'prodname' =>$request->prodname,
            'prodprice' => $request->prodprice,
            'prodqty' => $request->qty,
            'sellerid' => $request->venderid,
            'cartstatus' => 0,
            'delivery' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);


        $getmyallproducts = Orderdetail::where('userid', Auth::user()->id)->where('cartstatus' , 0)->get();
        
        
        return view('frontend.cart', compact('getmyallproducts'));
    }


    
    public function confirmOrder(Request $request) {
        $ids = $request->input('ids');
        $idArray = explode(',', $ids);
    
        $otp = mt_rand(100000, 999999);
        // Update the status of records with the specified IDs
        Orderdetail::whereIn('id', $idArray)->update(['cartstatus' => 1, 'otp' =>  $otp]);
    



        // Fetch prodid and prodqty for each entry
            $orderDetails = Orderdetail::whereIn('id', $idArray)->get(['prodid', 'prodqty']);

            // Update product stock based on the fetched details
            foreach ($orderDetails as $orderDetail) {
                $productId = $orderDetail->prodid;
                $productQty = $orderDetail->prodqty;

                // Update the 'stock' column in the 'products' table
                DB::table('products')->where('id', $productId)->decrement('stock', $productQty);
            }




        // Your logic here
    
        return view('frontend.thankyou', compact('otp'));
    }


    
    public function useraccount(Request $request)
    {
       
        $getmypendingoders = Orderdetail::where('userid' , Auth::user()->id)->where('cartstatus' , 1)->where('delivery' , 0)->orderBy('created_at', 'desc')->get();
        $getmycompletedoders = Orderdetail::where('userid' , Auth::user()->id)->where('cartstatus' , 1)->where('delivery' , 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.myaccount', compact('getmypendingoders', 'getmycompletedoders'));
    } 


    
    public function storefeedback(Request $request)
    {
        $reviewsubmit = Review::create([
            
            'userid' => Auth::user()->id,
            'username' => Auth::user()->name,
            'prodid' => $request->prodid,
            'prodname' => $request->prodname,
            'feeback' => $request->comment,
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            
        ]);

        
        return redirect()->back();


    } 




    
    public function searchprod(Request $request)
    {

        $currentDate = Carbon::now();

    // Calculate the date one week from now
    $oneWeekFromNow = $currentDate->copy()->addWeek();

    // Query the database for products with expiry date less than a week from now
    $getproducts = DB::table('products')
        ->where('status', 1)
        ->where('exp_date', '<', $oneWeekFromNow)
        ->get();




    $getallsellers = User::where('type' , 2)->where('status' , 1)->get();

    $uniqueProductIds = Orderdetail::distinct()->pluck('prodid');
    $bestSellingProducts = DB::table('products')->whereIn('id', $uniqueProductIds)->get();








        $searchTerm = $request->input('searchTerm');

        $products = DB::table('products')
                           ->where('name', 'like', "%$searchTerm%")
                           ->get();

        return view('frontend.searchresult', ['getallsellers' => $getallsellers, 'getproducts' => $getproducts, 'bestSellingProducts' => $bestSellingProducts, 'products' =>$products]);

    }


}