@extends('backend.layout.master')
@section('content')

<div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-sm-12">
            @include('backend.partials.messages')
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Manage Category</h4>
                </div>

                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Parent Category </th>
                            <th>Action</th>
                        </tr>
                        @foreach($category as $row)
                        <tr>
                            <td>#</td>
                            <td>{{$row->name}}</td>
                            <td>
                                <img src="{!! asset('public/images/category/'.$row->image) !!}" style=" width=150px;">
                            </td>
                            <td>
                                @if($row->parent_id == null)
                                Primary Category
                                @else
                                {{$row->parent->name}}
                                @endif
                            </td>
                            <td><a href="{{route('admin.category.edit',$row->id)}}" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-info">View</a>
                                <a href="{{route('admin.category.delete',$row->id)}}" class="btn btn-danger"
                                    id="delete">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection