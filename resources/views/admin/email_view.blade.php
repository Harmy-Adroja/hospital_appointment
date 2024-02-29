
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
  <style type="text/css">
      lable
      {
        display: inline-block;
        width: 200px;
      }
    </style>
  @include('layouts.admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    @include('layouts.admin.sidebar')
      <!-- partial -->
    @include('layouts.admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            
        <div class="container" align="center" style="padding-top: 50px; display: inline-block;">

            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                  x
                </button> 
                {{session()->get('message')}}
              </div>  
            @endif

                <form action="{{url('sendemail',$data->id)}}"  method="POST" >
                  @csrf
                    <div style="padding:15px;">
                        <lable>Greetings</lable>
                        <input type="text" style="color: #000000;" name="greeting"  required="">
                    </div>

                    <div style="padding:15px;">
                        <lable>Body</lable>
                        <input type="text" style="color: #000000;" name="body"  required="">
                    </div>

                    

                    <div style="padding:15px;">
                        <lable>Action Text</lable>
                        <input type="text" style="color: #000000;" name="actiontext"  required="">
                    </div>

                    <div style="padding:15px;">
                        <lable>Action Url</lable>
                        <input type="text" style="color: #000000;" name="actionurl"  required="">
                    </div>

                    <div style="padding:15px;">
                        <lable>End part</lable>
                        <input type="text" style="color: #000000;" name="endpart"  required="">
                    </div>

                    

                    <div style="padding:15px;">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    @include('layouts.admin.script')  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <script src="{{ asset('your_custom_script.js') }}"></script> 
  </body>
</html>