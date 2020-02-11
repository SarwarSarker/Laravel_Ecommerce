<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $category=Category::orderby('id','desc')->get();
        return view('backend.pages.categories.index',compact('category'));
    }
    public function create()
    {
        $main_categories=Category::orderby('name','desc')->where('parent_id', NULL)->get();
        return view('backend.pages.categories.create',compact('main_categories'));
    }
    public function store(Request $request)
    {   
         $this->validate($request,[
            'name' => 'required|max:250',
            'description' => 'required',
             'image' => 'nullable|image',
        ],
        [
            'name.required' => 'Please provide a  Category name',
             'image.required' => 'Please provide a vaild image with .jpg, .png, .jpeg, .gif extention..',
            
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->description = $request->description;
         //categoryimage model insert image

        if($request->hasFile('image')){
          //insert that image
           $image = $request->file('image');
           $img = time().'.'. $image->getClientOriginalExtension();
           $location = public_path('images/category/'.$img);
           Image::make($image)->save($location);
           $category->image = $img;
        }
        $category->save();

       
          session()->flash('success','Successfully Category Inserted!');

        return Redirect()->route('admin.categories');
     }

     public function edit($id)
     {
        $main_categories=Category::orderby('name','desc')->where('parent_id', NULL)->get();
        $category =  Category::find($id);
        if (!is_null($category)){
          return view('backend.pages.categories.edit',compact('category','main_categories'));
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
            'name.required' => 'Please provide a  Category name',
             'image.required' => 'Please provide a vaild image with .jpg, .png, .jpeg, .gif extention..',
            
        ]);
         
         $category =  Category::find($id);
         $category->name = $request->name;
         $category->parent_id = $request->parent_id;
         $category->description = $request->description;
         //categoryimage model insert image

        if($request->hasFile('image') ){
          //delete  old image first
          if(File::exists('public/images/category/'.$category->image))
            {
                File::delete('public/images/category/'.$category->image);
            }
           $image = $request->file('image');
           $img = time().'.'. $image->getClientOriginalExtension();
           $location = public_path('images/category/'.$img);
           Image::make($image)->save($location);
           $category->image = $img;
        }
        $category->save();

          session()->flash('success','Successfully Category Updated!');

        return Redirect()->route('admin.categories');
     }
     public function delete($id){
        $category =  Category::find($id);
        
         if(!is_null($category)){
             ///// Delete sub category 
             if($category->parent_id == NULL){
                $sub_categories=Category::orderby('name','desc')->where('parent_id', $category->id)->get();
                foreach($sub_categories as $sub){
                if(File::exists('public/images/category/'.$sub->image)) {
                        File::delete('public/images/category/'.$sub->image);
                    } 
                    $sub->delete();
             }
            }
             ///// Delete  category
            if(File::exists('public/images/category/'.$category->image)) {
                File::delete('public/images/category/'.$category->image);
            }
            $category->delete();
        }
        session()->flash('success','Successfully Category deleted!');
            return Redirect()->back(); 
        }
}
