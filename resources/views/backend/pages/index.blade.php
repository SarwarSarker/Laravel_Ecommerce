@extends('backend.layout.master')
 @section('content')
       <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <div class="row page-title-header">
              
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                </div>
              </div>
              <div class="card card-body">
               <center> <h3>Welcome to Your Admin Panel</h3>
                
                <p><a href="{{route('index')}}" class="btn btn-primary" >Visit Main Site</a></p></center>
              </div>
            
 
          
          </div>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 . All rights reserved.</span>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
 @endsection    