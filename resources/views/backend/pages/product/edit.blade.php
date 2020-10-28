@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>Edit Product</h4>
                    </div>
                    
                    <div class="card-body">
                  
                            <form action="{{route('admin.product.update',$product->id)}}" method="post" enctype="multipart/form-data"> 
                              @csrf 
                            <div class="form-group">
                                  <label for="exampleInputTitle">Title</label>
                                  <input type="text" class="form-control"  value="{{$product->title}}" name="title">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputDescription">Description</label>
                                  <textarea class="form-control" rows="6" cols="50"  name="description">{{$product->description}}</textarea>
                                  
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputPrice">Price</label>
                                  <input type="text" class="form-control"  value="{{$product->price}}" name="price">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputQuantity">Quantity</label>
                                  <input type="text" class="form-control"  value="{{$product->quantity}}" name="quantity">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputQuantity">Category</label>
                                  <select name="category_id" class="form-control">
                                  <option value="">Select a Category Name</option> 
                                  @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
                                  <option value="{{$parent->id}}"{{ $parent->id == $product->category->id ? 'selected' : ''}}>{{$parent->name}}</option>
                                  @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
                                  <option value="{{$child->id}}"{{ $child->id == $product->category->id ? 'selected' : ''}}> ------->{{$child->name}}</option>
                                  @endforeach 
                                  @endforeach
                                  </select> 
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputQuantity">Brand</label>
                                  <select name="brand_id" class="form-control">
                                  <option value="">Select a Brand Name</option>
                                  @foreach(App\Models\Brand::orderBy('name','asc')->get() as $br)
                                  <option value="{{$br->id}}"{{ $br->id == $product->brand->id ? 'selected' : ''}}>{{$br->name}}</option>
                                  @endforeach 
                                  </select>
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputOldImage">Old Image</label>
                                  @foreach($product->images as $image)
                                  <img src="{{asset('public/images/product/'. $image->image)}}" alt="{{$product->title}}" height="40">
                                  @endforeach
                                  <br>
                                  <br>
                                  <label for="exampleInputImage">Image (can attach more than one)</label>
                                  <div class="row">
                                      <div class="col-md-9">
                                          <input type="file" class="form-control" name="product_image[]" multiple />
                                      </div>
                                  </div>
                              </div>

                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </form>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    