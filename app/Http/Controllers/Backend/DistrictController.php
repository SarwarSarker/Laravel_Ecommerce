<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $district=District::orderby('id','desc')->get();
        return view('backend.pages.district.index',compact('district'));
    }
    public function create()
    {
        $division=Division::orderby('priority','asc')->get();
        return view('backend.pages.district.create',compact('division'));
    }
    
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
             'name' => 'required',
             'division_id' => 'required',
            ]);

        $district = new District;
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

     
        
          session()->flash('success','Successfully district Inserted!');

        return Redirect()->route('admin.districts');
     }
     public function edit($id)
     {
        $division=Division::orderby('priority','asc')->get();
        $district=District::find($id);
        return view('backend.pages.district.edit',compact('district','division'));
     }
     public function update(Request $request ,$id)
     {   
         $validatedData = $request->validate([
             'name' => 'required',
 
             ]);
 
         $district =  District::find($id);
         $district->name = $request->name;
         $district->division_id = $request->division_id;
         $district->save();
 
         
           session()->flash('success','Successfully district Updated!');
 
         return Redirect()->route('admin.districts');
      }
     public function delete($id){
        $district =  District::find($id);
        
        
        if(!is_null($district)){
            $district->delete();
        }
        session()->flash('success','Successfully district deleted!');   
        return Redirect()->back(); 
        }
}
