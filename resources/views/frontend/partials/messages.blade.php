<!-- @if( Session::has( 'success' ))
     <div class="alert alert-success">
        <p>{{ Session::get( 'success' ) }}</p>
     </div>
@endif -->


@if ( Session::get('success'))
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <p>{{ Session::get('success') }}</p>
            </div>
        </div>
    </div>
</div>
@endif


@if ( Session::get('error'))
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <p>{{ Session::get('error') }}</p>
            </div>
        </div>
    </div>
</div>
@endif


@if ( Session::get('warning'))
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-warning alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <p>{{ Session::get('warning') }}</p>
            </div>
        </div>
    </div>
</div>
@endif


@if ( Session::get('info'))
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-info alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <p>{{ Session::get('info') }}</p>

            </div>
        </div>
    </div>
</div>
@endif


@if ($errors->any())
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-danger">

                <button type="button" class="close" data-dismiss="alert">×</button>

                Please check the form below for errors
            </div>
        </div>
    </div>
</div>
@endif