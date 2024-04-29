<!DOCTYPE html>
<html lang="en">
  <head>
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


    <div class="container-fluid page-body-wrapper">
    <div align="center" style="padding-top: 50px;">
        <div>
            <a class="btn btn-success" href="{{route('roles.create')}}"> Create New Role</a>
        </div>
    


<div style="padding:15px;">
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
        <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            
        </td>
    </tr>
    @endforeach
    </div>
</div>
</div>
</table>
{!! $roles->render() !!}


@include('layouts.admin.script')   
  </body>
</html>