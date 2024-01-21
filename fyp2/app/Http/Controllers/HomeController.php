<?php

  

namespace App\Http\Controllers;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\User;
 

use Illuminate\Http\Request;

  

class HomeController extends Controller

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

    public function index()

    {

        return redirect('/');


    } 

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function adminHome()

    {


        $orderCount = Orderdetail::where('delivery' , 1)->latest()->get();
       
       
        $orderAmountSum = Orderdetail::where('delivery', 1)
        ->selectRaw('SUM(prodqty * prodprice) as totalAmount')
        ->value('totalAmount');
    
            
        $productCount = DB::table('products')->get();
        $sellers = User::where('type' , 2)->latest()->get();

        return view('backend.index', ['orderCount' => $orderCount, 'orderAmountSum' => $orderAmountSum, 'productCount' => $productCount, 'sellers' => $sellers]);

    }

  

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Contracts\Support\Renderable

     */

    public function managerHome()

    {
        $orderCount = Orderdetail::where('delivery' , 1)->where('sellerid' , Auth::user()->id)->latest()->get();
       
       
        $orderAmountSum = Orderdetail::where('delivery', 1)
        ->where('sellerid', Auth::user()->id)
        ->selectRaw('SUM(prodqty * prodprice) as totalAmount')
        ->value('totalAmount');
    
            
        $productCount = DB::table('products')->where('vendor_id' , Auth::user()->id)->get();


        return view('seller.index', ['orderCount' => $orderCount, 'orderAmountSum' => $orderAmountSum, 'productCount' => $productCount]);

    }

}