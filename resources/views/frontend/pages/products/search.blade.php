@extends('frontend.l_out.master')


@section('content')
             <!-- start sidebar +  main div-->
			 <div class="container margin-top-20">
         <div class="row">
        <div class="col-sm-12">
           			<!-- BREADCRUMB -->
			<div id="breadcrumb" class="section mb-4" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<center><h2 class="breadcrumb-header"> Search Products</span></h2></center>
						
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->    
    <section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
            @include('frontend.partials.sidebar')
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
             
            @include('frontend.partials.all_products')

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	   </section>
 
@endsection
   
