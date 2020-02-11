<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Admin;
use Image;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        
        $admin = Admin::orderBy('id', 'asc')->get();
        return view('backend.pages.index', compact('admin'));
    }
    
     

}
