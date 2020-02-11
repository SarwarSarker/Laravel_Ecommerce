@extends('frontend.l_out.master')

@section('content')
  <br>
  <br>
  <br>
  <div class="container mt-2 ">
    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class='img rounded-circle' style='height:100px' >
                <a href="{{ route('user.dashbroad') }}" class="list-group-item {{ route::is('user.dashbroad') ? 'active' : '' }}">Dashbroad</a>
                <a href="{{ route('user.profile') }}" class="list-group-item {{ route::is('user.profile') ? 'active' : '' }}">Update Profile</a>
              
            </div>
        </div>
        <div class="col-md-8">
        <div class="card card-body">
        @yield('sub-content')
        </div>
       
        </div>
    </div>
  </div>
  



@endsection