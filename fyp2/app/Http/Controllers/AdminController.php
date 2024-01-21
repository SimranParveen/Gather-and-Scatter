<?php

  

namespace App\Http\Controllers;

 

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\User;
use App\Models\Review;
use App\Models\Apparel;
use App\Models\Marketing;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductNotificationMail;


  

class AdminController extends Controller

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

    public function addproduct()

    {
        $allsellers = User::where('type' , 2)->get();
        return view('backend.addproduct', ['allsellers' => $allsellers]);
    } 

    
    public function storeproduct(Request $request)
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
    $vendor_id = $request->input('vendor_id');
    $status = $request->input('status');

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
    ]);

    // Retrieve all sellers
   

    $allproducts = DB::table('products')->get();
    return view('backend.listproduct', ['allproducts' => $allproducts]);
}


public function listproduct()
{
    $allproducts = DB::table('products')->get();
    return view('backend.listproduct', ['allproducts' => $allproducts]);
} 


public function editproduct(Request $request)
    {
        $allsellers = User::where('type' , 2)->get();
        $productrecord = DB::table('products')->where('id' , $request->id)->first();
        return view('backend.editproduct', ['productrecord' => $productrecord, 'allsellers' => $allsellers]);
    } 



    public function updateproduct(Request $request)
    {

        if ($request->has('notify')) {
            
            $userEmails = User::where('type' , 0)->pluck('email')->toArray();
            $productName = 'New Product';

            // Send notification emails
            foreach ($userEmails as $email) {
                // Customize this line to send an actual email
                // You might want to use a Mailable class for better email organization
                Mail::to($email)->send(new ProductNotificationMail($productName));
            }
        }





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
        $seller->status = $request->has('status') ? 1 : 0;
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
    



        $allproducts = DB::table('products')->get();
        return view('backend.listproduct', ['allproducts' => $allproducts]);
    }






    
    public function liststore()
    {
        $allstores =  Apparel::get();
      
        return view('backend.liststore', ['allstores' => $allstores]);
        
    } 


    
    public function editstore(Request $request)
    {
       
        $storerecord = Apparel::where('id' , $request->id)->first();
        return view('backend.editstore', ['storerecord' => $storerecord]);
    } 

    
    public function updatestore(Request $request)
    {
      
        $storeupdate = Apparel::find($request->input('id'));
    
        if (!$storeupdate) {
            // Handle the case where the record is not found
        }
    
        $storeupdate->name = $request->input('name');
        $storeupdate->phone = $request->input('phone');
        $storeupdate->address = $request->input('address');
        $storeupdate->timing = $request->input('timing');
        $storeupdate->map = $request->input('map');
        $storeupdate->type = $request->type;
        $storeupdate->status = $request->status;

    
        // Save the updated record
        $storeupdate->save();
    
        $allstores =  Apparel::get();
        return view('backend.liststore', ['allstores' => $allstores]);
    }

    public function addstore()
    {
        return view('backend.addstore');
    }
    
    
    
    public function storestore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        // Process and store the data
        $storeupdate = new Apparel();
        $storeupdate->name = $request->input('name');
        $storeupdate->phone = $request->input('phone');
        $storeupdate->address = $request->input('address');
        $storeupdate->timing = $request->input('timing');
        $storeupdate->map = $request->input('map');
        $storeupdate->type = $request->type;
        $storeupdate->status = $request->status;
        $storeupdate->save();

       $allstores =  Apparel::get();
        return view('backend.liststore', ['allstores' => $allstores]);
       
    } 
















    





    public function listseller()
    {
        $allsellers = User::where('type' , 2)->get();
        return view('backend.listseller', ['allsellers' => $allsellers]);
    } 

    public function editseller(Request $request)
    {
        $sellerrecord = User::where('id' , $request->id)->first();
        return view('backend.editseller', ['sellerrecord' => $sellerrecord]);
    } 


    
    public function updateSeller(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
          
            // Assuming logo is an image file (2MB limit)
        ]);
        // Retrieve the seller record
        $seller = User::findOrFail($request->id);
        // Update the seller's attributes with the form data
        $seller->name = $request->input('name');
        $seller->about = $request->input('about');
        $seller->since = $request->input('since');
        $seller->whatsapp = $request->input('whatsapp');
        $seller->phone = $request->input('phone');
        $seller->address = $request->input('address');
        $seller->area = $request->input('area');
        $seller->status = $request->input('status');
        $seller->fb = $request->input('fb');
        $seller->insta = $request->input('insta');
        $seller->youtube = $request->input('youtube');
        $seller->email = $request->input('email');
        $seller->map = $request->input('map');


        if ($request->hasFile('logo')) {
            // Handle logo update
            $file = $request->file('logo');
            $filename = 'logos/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $seller->logo = $filename;
        }

        if ($request->filled('password')) {
           
            // Check if the 'password' field is present in the request
            $seller->password = Hash::make($request->input('password'));
        }
    
        $seller->save();
    
        $allsellers = User::where('type' , 2)->get();
        return view('backend.listseller', ['allsellers' => $allsellers]);
    }
    


    public function addseller()
    {
        return view('backend.addseller');
    } 


    







    public function storeseller(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // Assuming logo is an image file (2MB limit)
        ]);

        // Process and store the data
        $seller = new User();
        $seller->name = $request->input('name');
        $seller->email = $request->input('email');
        $seller->password = Hash::make($request->input('password'));
        $seller->about = $request->input('about');
        $seller->since = $request->input('since');
        $seller->whatsapp = $request->input('whatsapp');
        $seller->phone = $request->input('phone');
        $seller->address = $request->input('address');
        $seller->area = $request->input('area');
        $seller->status = $request->input('status');
        $seller->fb = $request->input('fb');
        $seller->insta = $request->input('insta');
        $seller->youtube = $request->input('youtube');
        $seller->map = $request->input('map');
        $seller->type = 2;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = 'logos/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
        
            $seller->logo = $filename;
        }

        

        $seller->save();
        return view('backend.addseller')->with('success', 'Seller information has been saved.');
       
    } 



    //reviews
    
    public function reviewlist()
    {
        
        $getpendingreviews = Review::where('status' , 0)->latest()->get();
        $getallreviews = Review::latest()->get();
    
        return view('backend.reviewlist', ['getpendingreviews' => $getpendingreviews, 'getallreviews' => $getallreviews]);
    } 


    
    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['error' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully']);
    }


    public function approve($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['error' => 'Review not found'], 404);
        }

        // Update the status to 1 (assuming status is a boolean field)
        $review->update(['status' => 1]);

        return response()->json(['message' => 'Review approved successfully']);
    }



    //Order

    
    public function deliveredorder()
    {
        $deliveredorder = Orderdetail::where('delivery' , 1)->latest()->get();
        return view('backend.deliveredorder', ['deliveredorder' => $deliveredorder]);
    } 

    public function pendingorder()
    {
        $pendingorder = Orderdetail::where('delivery' , 0)->latest()->get();
        return view('backend.pendingorder', ['pendingorder' => $pendingorder]);
    } 
 


    //Marketing


    
    public function promotionslist()
    {
        $promotions = Marketing::latest()->get();
        return view('backend.promotionslist', ['promotions' => $promotions]);
    } 

    
    public function addpromotion()
    {

        $allsellers = User::where('type' , 2)->get();
        return view('backend.addpromotion', ['allsellers' => $allsellers]);
    } 




    
    public function storepromotion(Request $request)
    {
        
    
        // Retrieve form data
        $sellerid = $request->input('sellerid');
        $url = $request->input('url');
        $charges = $request->input('charges');
        $exp_on = $request->input('exp_on');
       
        $status = $request->input('status');
    
        // Handle file upload
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'logos/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $image = $filename;
        }
    
        // Insert data into the 'products' table using DB facade
        Marketing::create([
            'sellerid' => $sellerid,
            'url' => $url,
            'charges' => $charges,
            'exp_on' => $exp_on,
         
            'status' => $status,
            'image' => $image,
        ]);
    
        // Retrieve all sellers
       
    
        $promotions = Marketing::latest()->get();
        return view('backend.promotionslist', ['promotions' => $promotions]);
    }





    public function editpromotion(Request $request)
    {
        $allsellers = User::where('type' , 2)->get();
        $promoid = Marketing::where('id' , $request->id)->first();
        return view('backend.editpromotion', ['promoid' => $promoid, 'allsellers' => $allsellers]);
    } 





    public function updatepromotion(Request $request)
    {
        $promo = Marketing::find($request->input('id'));
    
        if (!$promo) {
            // Handle the case where the record is not found
        }
    
        $promo->sellerid = $request->input('sellerid');
        $promo->url = $request->input('url');
        $promo->charges = $request->input('charges');
        $promo->exp_on = $request->input('exp_on');
        $promo->status = $request->filled('status') ? 1 : 0;

    
        if ($request->hasFile('image')) {
            // Handle image update
            $file = $request->file('image');
            $filename = 'logos/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $promo->image = $filename;
        }
    
        // Save the updated record
        $promo->save();
    
        $promotions = Marketing::latest()->get();
        return view('backend.promotionslist', ['promotions' => $promotions]);
    }


    


    public function destroypromotion($id)
    {
        $promo = Marketing::find($id);

        if (!$promo) {
            return response()->json(['error' => 'Promotion not found'], 404);
        }

        $promo->delete();

        $promotions = Marketing::latest()->get();
        return view('backend.promotionslist', ['promotions' => $promotions]);
    }
    





}