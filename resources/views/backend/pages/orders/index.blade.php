@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>Manage Orders</h4>
                    </div>
                    
                    <div class="card-body">
                       <table class="table table-hover table-striped display" id="datatable">
                       <thead>
                           <tr>
                            <th>#</th>
                            <th>Order Code</th>
                            <th>Orderer Name</th>
                            <th>Orderer Phone NO</th>
                            <th>Order Status </th>
                            <th>Payment Status </th>
                            <th>Action</th>
                           </tr>
                      </thead>
                      <tbody>
                           @foreach($orders as $row)
                           <tr>
                            <td>{{$loop->index+1}}</td>
                            <td> #LE{{$row->id}} </td>
                            <td> {{$row->name}} </td>
                            <td>{{$row->phone_no}} </td>
                            <td> 
                               <p>
                               @if ($row->is_seen_by_admin)
                                 <button type="button" class="btn btn-success">Seen</button>
                               @else
                                 <button type="button" class="btn btn-warning">UnSeen</button>
                               @endif
                               </p>

                               <p>
                               @if ($row->is_completed)
                                 <button type="button" class="btn btn-success">Completed</button>
                               @else
                                 <button type="button" class="btn btn-primary">Not Completed</button>
                               @endif
                               </p>
                               </td>

                               <td>
                               <p>
                               @if ($row->is_paid)
                                 <button type="button" class="btn btn-success">Paid</button>
                               @else
                                 <button type="button" class="btn btn-danger">UnPaid</button>
                               @endif
                               </p>
                            </td>
                            <td>
                            <a href="{{route('admin.orders.show',$row->id)}}" class="btn btn-info" >View</a>
                            <a href="{{route('admin.orders.delete',$row->id)}}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                           </tr>
                           @endforeach
                           
                          </tbody>
                          
                          
                       </table>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    