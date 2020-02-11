<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
      $brand=Brand::orderby('id','desc')->get();
        return view('backend.pages.brands.index',compact('brand'));
    }
    public function create()
    {
       return view('backend.pages.brands.create');
    }
    public function store(Request $request)
    {   
         $this->validate($request,[
            'name' => 'required|max:250',
            'description' => 'required',
             'image' => 'nullable|image',
        ],
        [
            'name.required' => 'Please provide a  Brand name',
             'image.required' => 'Please provide a vaild image with .jpg, .png, .jpeg, .gif extention..',
            
        ]);

      $brand = new Brand();
      $brand->name = $request->name;
      $brand->description = $request->description;
         //Brandimage model insert image

        if($request->hasFile('image')){
          //insert that image
           $image = $request->file('image');
           $img = time().'.'. $image->getClientOriginalExtension();
           $location = public_path('images/brand/'.$img);
           Image::make($image)->save($location);
         $brand->image = $img;
        }
      $brand->save();

       
          session()->flash('success','Successfully Brand Inserted!');
        return Redirect()->route('admin.brands');
     }

     public function edit($id)
     {
       
      $brand =  Brand::find($id);
        if (!is_null($brand)){
          return view('backend.pages.brands.edit',compact('brand'));
        }
        else{
            return Redirect()->back();
        }
     }
     public function update(Request $request ,$id)
     {   
        $this->validate($request,[
            'name' => 'required|max:250',
            'description' => 'required',
             'image' => 'nullable|image',
        ],
        [
            'name.required' => 'Please provide a  Brand name',
             'image.required' => 'Please provide a vaild image with .jpg, .png, .jpeg, .gif extention..',
            
        ]);
         
       $brand =  Brand::find($id);
       $brand->name = $request->name;
       $brand->description = $request->description;
         //Brandimage model insert image

        if($request->hasFile('image') ){
          //delete  old image first
          if(File::exists('public/images/brand/'.$brand->image))
            {
                File::delete('public/images/brand/'.$brand->image);
            }
           $image = $request->file('image');
           $img = time().'.'. $image->getClientOriginalExtension();
           $location = public_path('images/brand/'.$img);
           Image::make($image)->save($location);
         $brand->image = $img;
        }
      $brand->save();

        
        session()->flash('success','Successfully Brand Updated!');

        return Redirect()->route('admin.brands');
     }
     public function delete($id){
      $brand =  Brand::find($id);
        
         if(!is_null($brand)){
            
             ///// Delete  Brand
            if(File::exists('public/images/brand/'.$brand->image)) {
                File::delete('public/images/brand/'.$brand->image);
            }
          $brand->delete();
        }
         
        session()->flash('success','Successfully Brand deleted!'); 
        return Redirect()->back(); 
        }
}