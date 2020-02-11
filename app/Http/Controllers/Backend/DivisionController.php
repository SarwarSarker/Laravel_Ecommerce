<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\District;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $division=Division::orderby('id','asc')->get();
        return view('backend.pages.division.index',compact('division'));
    }
    public function create()
    {
        return view('backend.pages.division.create');
    }
    
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
             'name' => 'required',
             'priority' => 'required',
            ]);

        $division = new Division;
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

     
        
          session()->flash('success','Successfully division Inserted');  

        return Redirect()->route('admin.divisions');
     }
     public function edit($id)
     {
        $division=Division::find($id);
        return view('backend.pages.division.edit',compact('division'));
     }
     public function update(Request $request ,$id)
     {   
         $validatedData = $request->validate([
             'name' => 'required',
             'priority' => 'required',
 
             ]);
 
         $division =  Division::find($id);
         $division->name = $request->name;
         $division->priority = $request->priority;
         $division->save();
 
         
           session()->flash('success','Successfully division Updated!');  
 
         return Redirect()->route('admin.divisions');
      }
     public function delete($id){
        $division =  Division::find($id);
        
        
        if(!is_null($division)){
            //Delete all districts for this division
            $districts = District::where('division_id',$division->id )->get();
            foreach($districts as $dist){
                $dist->delete();
            }
            
            $division->delete();
        }
        session()->flash('success','Successfully division deleted!');    
        return Redirect()->back(); 
        }
}
