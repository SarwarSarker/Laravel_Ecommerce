@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>Manage Division</h4>
                    </div>
                    
                    <div class="card-body">
                       <table class="table table-hover table-striped">
                          <tr>
                            <th>#</th>
                            <th>Division Name</th>
                            <th>Priority</th>
                            <th>Action</th>
                           </tr>
                           @foreach($division as $row)
                           <tr>
                            <td>#</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->priority}}</td>
                            <td><a href="{{route('admin.division.edit',$row->id)}}" class="btn btn-success">Edit</a>
                            <a href="" class="btn btn-info" >View</a>
                            <a href="{{route('admin.division.delete',$row->id)}}" class="btn btn-danger" id="delete">Delete</a></td>
                           </tr>
                           @endforeach
                       </table>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    