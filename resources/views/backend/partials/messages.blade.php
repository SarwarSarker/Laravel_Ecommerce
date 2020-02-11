
            @if ( Session::get('success'))
            <div class="container mt-2">
            <div class="row justify-content-center">
            <div class="col-md-8">

            <div class="alert alert-success ">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

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
            <div class="alert alert-danger ">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>	

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
            <div class="alert alert-warning ">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

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
            <div class="alert alert-info ">

            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

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
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                        </div>
                        </div>
                        </div>
                        </div>
                   @endif