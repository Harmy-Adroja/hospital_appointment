
<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
  <!-- <style type="text/css">
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
            
        <div class="container" align="center" style="padding-top: 50px; display: inline-block;">

            @if(session()->has('message'))
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                  x
                </button> 
                {{session()->get('message')}}
              </div>  
            @endif
            
                {!! Form::open
                ([
                  'route' => ['doctor.update', $data->id],
                 'method' => 'POST', 
                 'enctype' => 'multipart/form-data'
                ]) !!}
                <!-- @csrf -->
                    <div style="padding:15px;">
                        <!-- <lable>Doctor Name</lable>
                        <input type="text" style="color: #000000;" name="name"  value="{{$data->name}}"> -->
                    {!! Form::label('name', 'Doctor Name') !!}
                    {!! Form::text('name', $data->name, 
                    ['style' => 'color: #000000;']) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Phone</lable>
                        <input type="number" style="color: #000000;" name="phone" value="{{$data->phone}}"> -->
                    {!! form::label('name','Phone')!!}
                    {!! form::number('phone',$data->phone,
                    ['style'=> 'color: #000000;']) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Speciality</lable>
                        <select name="speciality" style="color: #000000; width: 200px;" >
                            <option>--Select--</option> 
                            <option value="Skin">Skin</option>
                            <option value= "Heart" selected>Heart</option>
                            <option value="Eye">Eye</option>
                            <option value="Nose">Nose</option>
                        </select> -->

                    {!! Form::label('speciality', 'Speciality') !!}
                    {!! Form::select('speciality', 
                    ['' => '--Select--', 'Skin' => 'Skin', 'Heart' => 'Heart', 'Eye' => 'Eye', 'Nose' => 'Nose'], 
                    $data->speciality, 
                    ['style' => 'color: #000000; width: 200px;']
                    ) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Room No</lable>
                        <input type="number" style="color: #000000;" name="room" value="{{$data->room}}"> -->
                        {!! Form::label('room', 'Room No') !!}
                        {!! Form::number('room', $data->room,
                           ['style' => 'color: #000000;']) !!}
                        </div>

                    <div style="padding:15px;">
                        <!-- <lable>Old Image</lable>
                        <img height="40" width="40" src="doctorimage/{{$data->image}}"> -->
                        {!! Form::label('old_image', 'Old Image') !!}
                        {!! Html::image('doctorimage/' . $data->image, 'Old Image', 
                        ['height' => '40', 'width' => '40']) !!}

                    </div>

                    <div style="padding:15px;">
                        <!-- <lable>Change Image</lable>
                        <input type="file" style="color: #000000;" name="file"> -->
                        {!! Form::label('file', 'Change Image') !!}
                        {!! Form::file('file', ['style' => 'color: #000000;']) !!}
                    </div>

                    <div style="padding:15px;">
                        <!-- <input type="submit" class="btn btn-primary"> -->
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                     </div>
                  {!!Form::close()!!}
                <!-- </form> -->
              
            </div>
        </div>
    @include('layouts.admin.script')  
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <script src="{{ asset('your_custom_script.js') }}"></script> 
  </body>
</html>