<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Image;
use File;
use DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $product=Product::orderby('id','desc')->get();
        return view('backend.pages.product.index',compact('product'));
    }
    public function create()
    {
        return view('backend.pages.product.create');
    }
    
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'title' => 'required|max:250',
            'description' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',

            ]);

        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        
        $product->slug = str_slug($product->title);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->save();

          //productimage model insert image

        // if($request->hasFile('product_image')){
        //   //insert that image
        //    $image = $request->file('product_image');
        //    $img = time().'.'. $image->getClientOriginalExtension();
        //    $location = public_path('images/'.$img);
        //    Image::make($image)->save($location);

        //    $product_image = new ProductImage;
        //    $product_image->product_id = $product->id;
        //    $product_image->image = $img;
        //    $product_image->save();
        // }
        


        if($request->product_image > 0 ){
            foreach($request->product_image as $image){
                $img = time() .'.'. $image->getClientOriginalExtension();
                $location = public_path('images/product/'.$img);
                Image::make($image)->save($location);

                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }
     
          session()->flash('success','Successfully Product Inserted!'); 

        return Redirect()->route('admin.products');
     }
     public function edit($id)
     {
        $product=Product::find($id);
        return view('backend.pages.product.edit',compact('product'));
     }
     public function update(Request $request ,$id)
     {   
         $validatedData = $request->validate([
             'title' => 'required|max:250',
             'description' => 'required',
             'price' => 'required|numeric',
             'quantity' => 'required|numeric',
             'category_id' => 'required|numeric',
             'brand_id' => 'required|numeric',
 
             ]);
 
         $product =  Product::find($id);
         $product->title = $request->title;
         $product->description = $request->description;
         $product->price = $request->price;
         $product->quantity = $request->quantity;
         $product->category_id = $request->category_id;
         $product->brand_id = $request->brand_id;
         
         $product->save();
        
         if($request->product_image > 0 ){
            
            $product_image = ProductImage::where('product_id', $product->id)->get();
    
            foreach ($product_image as $product_images) {
                ProductImage::where('id', $product_images->id)->delete();
                if(File::exists('public/images/product/'.$product_images->image)) 
                {
                    File::delete('public/images/product/'.$product_images->image);
                } 
            }
            foreach($request->product_image as $image){

                $img = time() .'.'. $image->getClientOriginalExtension();
                $location = public_path('images/product/'.$img);
                Image::make($image)->save($location);

                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;
                $product_image->save();
            }
        }
         
         session()->flash('success','Successfully Product Updated!'); 
 
         return Redirect()->route('admin.products');
      }
     public function delete($id){
       
        $product = Product::find($id);

        $product_image = ProductImage::where('product_id', $product->id)->get();
        
        foreach ($product_image as $product_images) {
            ProductImage::where('id', $product_images->id)->delete();
            if(File::exists('public/images/product/'.$product_images->image)) {
                File::delete('public/images/product/'.$product_images->image);
            } 
        }

        Product::where('id', $product->id)->delete();
            
        session()->flash('success','Successfully Product deleted!');    
        return Redirect()->back(); 
        }
     

}