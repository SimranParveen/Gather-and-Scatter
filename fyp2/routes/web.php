<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SellerController;
use App\Models\User;
use App\Models\Apparel;
use App\Models\Orderdetail;
use Carbon\Carbon;
  

/*

|--------------------------------------------------------------------------

| Web Routes

|--------------------------------------------------------------------------

|

| Here is where you can register web routes for your application. These

| routes are loaded by the RouteServiceProvider within a group which

| contains the "web" middleware group. Now create something great!

|

*/
Route::get('/start', function () {
    return view('bulb');
});





Route::get('/', function () {

    $currentDate = Carbon::now();

    // Calculate the date one week from now
    $oneWeekFromNow = Carbon::now()->addWeek();

    $shortexp = DB::table('products')
        ->where('status', 1)
        ->where('exp_date', '<', $oneWeekFromNow)
        ->where('exp_date', '>=', Carbon::now()) // Ensure exp_date is not passed
        ->get();


    

    $getallsellers = User::where('type' , 2)->where('status' , 1)->get();
    $getproducts = DB::table('products')->where('status' , 1)->get();

    


    $uniqueProductIds = Orderdetail::distinct()->pluck('prodid');
    $bestSellingProducts = DB::table('products')->whereIn('id', $uniqueProductIds)->get();
    
    return view('frontend.index' , ['getallsellers' => $getallsellers, 'getproducts' => $getproducts, 'bestSellingProducts' => $bestSellingProducts, 'shortexp' => $shortexp]);

});










Route::get('/deals', function () {



    $getallsellers = User::where('type' , 2)->where('status' , 1)->get();
    $getproducts = DB::table('products')->where('status' , 1)->get();


    $uniqueProductIds = Orderdetail::distinct()->pluck('prodid');
    $bestSellingProducts = DB::table('products')->whereIn('id', $uniqueProductIds)->get();
    
    return view('frontend.deals' , ['getallsellers' => $getallsellers, 'getproducts' => $getproducts, 'bestSellingProducts' => $bestSellingProducts]);

});

Route::get('/aboutus', function () {
    return view('frontend.aboutus');

});

Route::get('/contactus', function () {
    return view('frontend.contactus');

});



Route::get('/shop', function () {



    $getallsellers = User::where('type' , 2)->where('status' , 1)->get();
    $getproducts = DB::table('products')->where('status' , 1)->get();


    $uniqueProductIds = Orderdetail::distinct()->pluck('prodid');
    $bestSellingProducts = DB::table('products')->whereIn('id', $uniqueProductIds)->get();
    
    return view('frontend.shop' , ['getallsellers' => $getallsellers, 'getproducts' => $getproducts, 'bestSellingProducts' => $bestSellingProducts]);

});




Route::get('/shortexpiry', function () {

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
    
    return view('frontend.shortexpiry' , ['getallsellers' => $getallsellers, 'getproducts' => $getproducts, 'bestSellingProducts' => $bestSellingProducts]);

});





Route::get('/apparels', function () {
    $getaddress = Apparel::where('status' , 1)->get();
    return view('frontend.apparels' , ['getaddress' => $getaddress]);
});







Route::get('/vendordetails', [FrontendController::class, 'vendordetails'])->name('vendordetails');
Route::get('/singleproduct', [FrontendController::class, 'singleproduct'])->name('singleproduct');

Route::post('/addtocart', [FrontendController::class, 'addtocart'])->name('addtocart');
Route::get('/confirmorder', [FrontendController::class, 'confirmorder'])->name('confirmorder');

Route::get('/useraccount', [FrontendController::class, 'useraccount'])->name('useraccount');



Route::post('/storefeedback', [FrontendController::class, 'storefeedback'])->name('storefeedback');
Route::get('/searchprod', [FrontendController::class, 'searchprod'])->name('product.searchprod');








Auth::routes();

  

/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {

  

    Route::get('/home', [HomeController::class, 'index'])->name('home');

});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

  
    
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
    //Product
    
    Route::get('/admin/add-product', [AdminController::class, 'addproduct'])->name('addproduct');
    Route::post('/admin/store-product', [AdminController::class, 'storeproduct'])->name('storeproduct');
    Route::get('/admin/list-product', [AdminController::class, 'listproduct'])->name('listproduct');
    Route::get('/admin/edit-product/{id}', [AdminController::class, 'editproduct'])->name('editproduct');
    Route::post('/admin/update-product', [AdminController::class, 'updateproduct'])->name('updateproduct');

    //Vendor / Seller routes
    Route::get('/admin/list-seller', [AdminController::class, 'listseller'])->name('listseller');
    Route::get('/admin/edit-seller/{id}', [AdminController::class, 'editseller'])->name('editseller');
    Route::post('/admin/update-seller', [AdminController::class, 'updateseller'])->name('updateseller');
    Route::get('/admin/add-seller', [AdminController::class, 'addseller'])->name('addseller');
    Route::post('/admin/store-seller', [AdminController::class, 'storeseller'])->name('storeseller');



    //Apperals
    Route::get('/admin/list-store', [AdminController::class, 'liststore'])->name('liststore');
    Route::get('/admin/edit-store/{id}', [AdminController::class, 'editstore'])->name('editstore');
    Route::post('/admin/update-store', [AdminController::class, 'updatestore'])->name('updatestore');
    Route::get('/admin/add-store', [AdminController::class, 'addstore'])->name('addstore');
    Route::post('/admin/store-store', [AdminController::class, 'storestore'])->name('storestore');





    //reviews

    Route::get('/admin/reviewlist', [AdminController::class, 'reviewlist'])->name('reviewlist');
    Route::delete('/reviews/{id}', [AdminController::class, 'destroy']);
    Route::post('/reviews/approve/{id}', [AdminController::class, 'approve']);


    //Order views

    Route::get('/admin/deliveredorder', [AdminController::class, 'deliveredorder'])->name('deliveredorder');
    Route::get('/admin/pendingorder', [AdminController::class, 'pendingorder'])->name('pendingorder');



    Route::get('/admin/promotionslist', [AdminController::class, 'promotionslist'])->name('promotionslist');
    Route::get('/admin/add-promotion', [AdminController::class, 'addpromotion'])->name('addpromotion');
    Route::post('/admin/store-promotion', [AdminController::class, 'storepromotion'])->name('storepromotion');
    Route::get('/admin/edit-promotion/{id}', [AdminController::class, 'editpromotion'])->name('editpromotion');
    Route::post('/admin/update-promotion', [AdminController::class, 'updatepromotion'])->name('updatepromotion');
    Route::delete('/admin/destroypromotion/{id}', [AdminController::class, 'destroypromotion'])->name('destroypromotion');
});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {

  

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/add-product-seller', [SellerController::class, 'addproductseller'])->name('addproductseller');
    Route::post('/manager/store-product-seller', [SellerController::class, 'storeproductseller'])->name('storeproductseller');


    Route::get('/manager/list-product-seller', [SellerController::class, 'listproductseller'])->name('listproductseller');
    Route::get('/manager/edit-product-seller/{id}', [SellerController::class, 'editproductseller'])->name('editproductseller');
    Route::post('/manager/update-product-seller', [SellerController::class, 'updateproductseller'])->name('updateproductseller');



        //Order views

        Route::get('/manager/mydeliveredorder', [SellerController::class, 'mydeliveredorder'])->name('mydeliveredorder');
        Route::get('/manager/mypendingorder', [SellerController::class, 'mypendingorder'])->name('mypendingorder');
        Route::post('/manager/update-delivery/{id}', [SellerController::class, 'myupdateDelivery'])->name('myupdateDelivery');

});