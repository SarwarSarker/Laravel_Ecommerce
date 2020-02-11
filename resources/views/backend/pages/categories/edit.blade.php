@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>Edit category</h4>
                    </div>
                    
                    <div class="card-body">
                   
                            <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data"> 
                            @csrf 
                            <div class="form-group">
                                  <label for="exampleInputName">Name</label>
                                  <input type="text" class="form-control"   value="{{$category->name}}" name="name">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputDescription">Description</label>
                                  <textarea class="form-control" rows="6" cols="50" placeholder="Description" name="description">{{$category->description}} </textarea>
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputParentCategroy">Parent Categroy</label>
                                     <select class="form-control" name="parent_id">
                                       <option value="">Please select a Primary category</option>
                                       @foreach($main_categories as $row)
                                           <option value="{{$row->id}}" {{ $row->id == $category->parent_id ? 'selected' : ''}}>{{$row->name}}</option>
                                       @endforeach
                                     </select>
                                 </div>
                                 <div class="form-group">
                                 <label for="exampleInputOldImage">Old Image</label>
                                 <img src="{!! asset('public/images/category/'.$category->image) !!}" style=" height:50px; width=60px;">
                                 <br>
                                  <label for="exampleInputImage">New Image</label>
                                     <input type="file" class="form-control"   name="image">
                                 </div>
                                <button type="submit" class="btn btn-primary">Upadate Category</button>
                            </form>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    