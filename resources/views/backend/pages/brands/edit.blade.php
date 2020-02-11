@extends('backend.layout.master')

 @section('content')

 <div class="container" style="margin-top:30px;">
 
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
            
                    <div class="card-header bg-primary" >
                          <h4>Edit Brand</h4>
                         
                    </div>
                   
                    <div class="card-body">
                   
                            <form action="{{route('admin.brands.update',$brand->id)}}" method="post" enctype="multipart/form-data"> 
                            @csrf 
                            <div class="form-group">
                                  <label for="exampleInputName">Name</label>
                                  <input type="text" class="form-control"   value="{{$brand->name}}" name="name">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputDescription">Description</label>
                                  <textarea class="form-control" rows="6" cols="50" placeholder="Description" name="description">{{$brand->description}} </textarea>
                                 </div>
                                 <div class="form-group">
                                 <label for="exampleInputOldImage">Old Image</label>
                                 <img src="{!! asset('public/images/brand/'.$brand->image) !!}" style=" height:50px; width=60px;">
                                 <br>
                                  <label for="exampleInputImage">New Image</label>
                                     <input type="file" class="form-control"   name="image">
                                 </div>
                                <button type="submit" class="btn btn-primary">Upadate Brand</button>
                            </form>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    