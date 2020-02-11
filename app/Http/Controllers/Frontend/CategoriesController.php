<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        //
    }

    
    public function show($id)
    {
        $category =Category::find($id);
        

        if(!is_null($category)){
            return view('frontend.pages.categories.show',compact('category'));
        }else{
            $notification = array(
                'message' => 'Sorry , There is no category by  this URL!!', 
                'alert-type' => 'success'
              );
    
            return Redirect()->route('categories')->with($notification);
        }
    }

}
