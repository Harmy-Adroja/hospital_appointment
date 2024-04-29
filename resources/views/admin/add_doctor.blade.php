<!DOCTYPE html>
<html lang="en">
  <!-- <head>
    <style type="text/css">
      lable
      {
        display: inline-block;
        width: 200px;
      }
    </style> -->
    {!! Html::style('', ['type' => 'text/css']) !!}
    <style>
      label {
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
            
        <div class="container" align="center" style="padding-top: 50px;">
       
            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                  x
                </button> 
                {{session()->get('message')}}
              </div>  
            @endif
            

                  {!! Form::open([
                    'route' => 'doctor.store',
                    'method' => 'POST',
                    'enctype' => 'multipart/form-data'
                    ]) !!}
                  <!-- @csrf -->
                  
                    <div style=" padding:15px;">
                        <!-- <lable>Doctor Name</lable>
                        <input type="text" style="color: #000000;" name="name" placeholder="Write the name" required=""> -->
                        {!! Form::label('name', 'Doctor Name') !!}
                        {!! 
                        Form::text('name', null, [ 
                        'style' => 'color: #000000;', 
                        'placeholder' => 'Write the name', 
                        'required' => ''
                        ]) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Phone</lable>
                        <input type="number" style="color: #000000;" name="phone" placeholder="Write the Phone number" required=""> -->
                        {!! Form::label('name', 'Phone') !!}
                        {!! 
                        Form::number('phone', null, [ 
                        'style' => 'color: #000000;', 
                        'placeholder' => 'Write the phone number', 
                        'required' => ''
                        ]) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Speciality</lable>
                        <select name="speciality" style="color: #000000; width: 200px;" required="">
                            <option>--Select--</option> 
                            <option value="Skin">Skin</option>
                            <option value="Heart">Heart</option>
                            <option value="Eye">Eye</option>
                            <option value="Nose">Nose</option>
                        </select> -->

                        {!! Form::label('speciality', 'Speciality') !!}
                        {!!
                          Form::select('speciality',
                            ['' => '--Select--','Skin' => 'Skin', 'Heart' => 'Heart', 'Eye' => 'Eye', 'Nose' => 'Nose'], 
                            null, 
                            ['style' => 'color: #000000; width: 200px;', 'required' => '']) 
                        !!}

                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Room No</lable>
                        <input type="number" style="color: #000000;" name="room" placeholder="Write the room number" required=""> -->
                        {!! Form::label('name', 'Room No') !!}
                        {!! 
                        Form::number('room', null, [ 
                        'style' => 'color: #000000;', 
                        'placeholder' => 'Write the Room number', 
                        'required' => ''
                        ]) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Doctor Image</lable>
                        <input type="file" name="file" required=""> -->

                        {!! Form::label('file', 'Doctor Image') !!}
                        {!! Form::file('file', ['required' => '']) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <input type="submit" class="btn btn-primary"> -->
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    </div>
                  
                <!-- </form> -->
                {!!Form::close()!!}
              
            </div>
        </div>
    @include('layouts.admin.script')  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <script src="{{ asset('your_custom_script.js') }}"></script> 
  </body>
</html>