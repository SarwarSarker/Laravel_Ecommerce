@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>Edit District</h4>
                    </div>
                    
                    <div class="card-body">
                    
                            <form action="{{route('admin.district.update',$district->id)}}" method="post" enctype="multipart/form-data"> 
                              @csrf 
                            <div class="form-group">
                                  <label for="exampleInputName">Name</label>
                                  <input type="text" class="form-control"  value="{{$district->name}}" name="name">
                                 </div>
                                 <div class="form-group">
                                  <label for="exampleInputQuantity">Select a division for this district</label>
                                  <select name="division_id" class="form-control">
                                  <option value="">Select a division for this district</option> 
                                  @foreach($division as $division)
                                  <option value="{{$division->id}}" {{$division->id  ==  $district->division_id ? 'selected' : ''}}>{{$division->name}}</option>
                                  @endforeach
                                  </select> 
                                 </div>

                                 <!--

                                <div class="form-group">
                                  <label for="exampleInputBrand_id">Brand_id</label>
                                  <input type="text" class="form-control"  placeholder="Password" name="brand_id">
                                </div> -->
                                <button type="submit" class="btn btn-primary">Update District</button>
                            </form>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    