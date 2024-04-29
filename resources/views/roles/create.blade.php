<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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

    <div class="container-fluid page-body-wrapper" style="padding-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <h2>Create New Role</h2>
            </div>
        </div>

    <!-- <div class="container-fluid page-body-wrapper"> -->
    <div class="container"  style="padding-top: 50px;">
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="permission">Permission:</label><br>     
                    @foreach($permission as $value)
                        <label>
                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                            {{ $value->name }}
                        </label><br>
                    @endforeach
                </div>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="pull-right" style="padding-top: 10px;">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    @include('layouts.admin.script')   
  </body>
</html>