<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Image;
use File;

class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $slider=Slider::orderby('id','asc')->get();
        return view('backend.pages.slider.index',compact('slider'));
    }
    
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
             'title' => 'required',
             'image' => 'required|image',
             'priority' => 'required',
             'button_link' => 'nullable|url',
            ]);

        $slider = new Slider;
        $slider->title = $request->title;
        $slider->button_text = $request->button_text;
        $slider->button_link = $request->button_link;
        $slider->priority = $request->priority;
        if($request->image > 0 ){
            //insert that image
             $image = $request->file('image');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/slider/'.$img);
             Image::make($image)->resize(1920, 570)->save($location);
           $slider->image = $img;
          }
        $slider->save();

     
        
          session()->flash('success','Successfully slider Inserted');  

        return Redirect()->route('admin.sliders');
     }
     
     public function update(Request $request ,$id)
     {   
         $validatedData = $request->validate([
             'title' => 'required',
             'image' => 'nullable|image',
             'priority' => 'required',
             'button_link' => 'nullable|url',
 
             ]);
 
         $slider =  Slider::find($id);
         $slider->title = $request->title;
         $slider->button_text = $request->button_text;
         $slider->button_link = $request->button_link;
         $slider->priority = $request->priority;

         if($request->image > 0 ){
             //Delete previous Image
            if(File::exists('public/images/slider/'.$slider->image))
            {
                File::delete('public/images/slider/'.$slider->image);
            }
            //insert that image
             $image = $request->file('image');
             $img = time().'.'. $image->getClientOriginalExtension();
             $location = public_path('images/slider/'.$img);
             Image::make($image)->resize(1920, 570)->save($location);
           $slider->image = $img;
          }
        
         $slider->save();
 
         
           session()->flash('success','Successfully slider Updated!');  
 
         return Redirect()->route('admin.sliders');
      }
     public function delete($id){
        $slider =  Slider::find($id);
        if(!is_null($slider)){
             ///// Delete  slider
           if(File::exists('public/images/slider/'.$slider->image)) {
            File::delete('public/images/slider/'.$slider->image);
              }
            $slider->delete();
         }
        session()->flash('success','Successfully slider deleted!');    
        return Redirect()->back(); 
        }
}