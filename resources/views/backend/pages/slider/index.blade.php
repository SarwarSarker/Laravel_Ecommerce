@extends('backend.layout.master')
 @section('content')

 <div class="container" style="margin-top:30px;">
   <div class="row">
     <div class="col-sm-12">
     @include('backend.partials.messages')
            <div class="card">
                    <div class="card-header bg-primary" >
                          <h4>Manage Slider</h4>
                    </div>
                    
                    <div class="card-body">
                    <div class="ad_btn">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                      ADD Slider
                    </button>
                    </div>
                    <!--ADD Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-info text-light">
                            <h5 class="modal-title" id="exampleModalCenterTitle">ADD Slider</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Title (<span style="color:red">Required</span>)</label>
                              <input type="text" class="form-control" name="title" required>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Image (<span style="color:red">Required</span>)</label>
                              <input type="file" class="form-control" name="image" required>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Button_Text (Optional)</label>
                              <input type="text" class="form-control" name="button_text">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Button_Link (Optional)</label>
                              <input type="text" class="form-control" name="button_link">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Priority</label>
                              <input type="text" class="form-control" name="priority" required>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">ADD</button>
                          </div>
                          </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!--END ADD Modal -->
                   


                       <table class="table table-hover table-striped">
                          <tr>
                            <th>#</th>
                            <th>Slider Title</th>
                            <th>Image</th>
                            <th>Button_Text</th>
                            <th>Button_Link</th>
                            <th>Priority</th>
                            <th>Action</th>
                           </tr>
                           @foreach($slider as $row)
                           <tr>
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$row->title}}</td>
                            <td>
                            <img src="{{asset('public/images/slider/'. $row->image)}}" alt="IMG-slider">
                            </td>
                            <td>{{$row->button_text}}</td>
                            <td>{{$row->button_link}}</td>
                            <td>{{$row->priority}}</td>
                            <td><button data-toggle="modal" data-target="#exampleModalEdit{{ $row->id }}" class="btn btn-success">Edit</button>
                            <a href="{{route('admin.slider.delete',$row->id)}}" class="btn btn-danger" id="delete">Delete</a></td>
                           </tr>
                             <!--EDIT Modal -->
                     <div class="modal fade" id="exampleModalEdit{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header bg-success text-light">
                            <h5 class="modal-title" id="exampleModalCenterTitle">EDIT Slider</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                          <form action="{{ route('admin.slider.update',$row->id) }}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Title <span class="text-danger">(Required)</span></label>
                              <input type="text" class="form-control" name="title"  value="{{ $row->title }}" required>
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Image 
                              <a href="{{asset('public/images/slider/'. $row->image)}}">Previous Image</a>  
                              <span class="text-danger">(Required)</span></label>
                              <input type="file" class="form-control" name="image"  value="{{ $row->image }}" >
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Button_Text <span class="text-muted">(Optional)</span></label>
                              <input type="text" class="form-control" name="button_text" value="{{ $row->button_text }}">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Button_Link <span class="text-muted">(Optional)</span></label>
                              <input type="text" class="form-control" name="button_link" value="{{ $row->button_link }}">
                            </div>
                            <div class="form-group">
                              <label for="recipient-name" class="form-control-label">Priority</label>
                              <input type="text" class="form-control" name="priority"  value="{{ $row->priority }}" required>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">EDIT</button>
                          </div>
                          </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                     <!--END EDIT Modal -->
                           @endforeach
                       </table>
                    </div>
            </div>

         
     </div>
   </div>
 </div>
 @endsection    