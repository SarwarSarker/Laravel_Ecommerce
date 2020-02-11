@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>ADD Division</h4>
                    </div>
                    
                    <div class="card-body">
                   
                            <form action="{{route('admin.division.store')}}" method="post" enctype="multipart/form-data"> 
                              @csrf 
                            <div class="form-group">
                                  <label for="exampleInputName">Name</label>
                                  <input type="text" class="form-control"  placeholder="Name" name="name">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputPriority">Priority</label>
                                  <input type="text" class="form-control"  placeholder="Priority" name="priority">
                                 </div>

                                

                                 <!--

                                <div class="form-group">
                                  <label for="exampleInputBrand_id">Brand_id</label>
                                  <input type="text" class="form-control"  placeholder="Password" name="brand_id">
                                </div> -->
                                <button type="submit" class="btn btn-primary">ADD Division</button>
                            </form>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    