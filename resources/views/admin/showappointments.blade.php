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
        <!-- partial -->

    <div class="table-responsive" style="overflow-x: auto;">
        <div align="center" style="padding-top:100px;">
            <table>
                <tr style="background-color:grey;">
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Patient name</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Email</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Phone</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Doctor name</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Date</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Message</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">attachment</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">status</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">approved</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">canceled</th>
                    <th style="width:10%;  padding:10px; font-size: 20px; color:white;">Send Mail</th>
                </tr>
                @foreach($data as $appoint)
                <tr style="background-color:white;" align="center">
                    <td style="width:10%; padding:10px;  color:black;">{{$appoint->name}}</td>
                    <td style="width:5%; padding:10px;  color:black;">{{$appoint->email}}</td>
                    <td style="width:10%; padding:10px;  color:black;">{{$appoint->phone}}</td>
                    <td style="width:10%; padding:10px;  color:black;">{{$appoint->doctor}}</td>
                    <td style="width:10%; padding:10px;  color:black;">{{$appoint->date}}</td>
                    <td style="width:10%; padding:10px;  color:black;">{{$appoint->message}}</td>
                    <td style="width:5%; padding:10px;  color:black;"><a href="{{url('/download',$appoint->attachment)}}">download</a></td>
                    <td style="width:5%; padding:10px;  color:black;">{{$appoint->status}}</td>
                    <td>
                        <a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Aprroved</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">canceled</a>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send Mail</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    @include('layouts.admin.script')
     
  </body>
</html>