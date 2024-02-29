<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  
  <title>One Health - Medical Center HTML5 Template</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
@include('layouts.user.topbar')

<div align="center" style="padding:70px;">
    <table>
        <tr style="background-color:#00D9A5;">
            <th style="padding:10px; font-size: 18px; color:#fff;">Doctor Name</th>
            <th style="padding:10px; font-size: 18px; color:white;">Date</th>
            <th style="padding:10px; font-size: 18px; color:white;">Message</th>
            <th style="padding:10px; font-size: 18px; color:white;">status</th>
            <th style="padding:10px; font-size: 18px; color:white;">file</th>
            <th style="padding:10px; font-size: 18px; color:white;">Cancel Appointment</th>
        </tr>
        @foreach($appoint as $appoints)
        <tr style="background-color:grey;" align="center">
            <td style="padding:10px;  color:black;">{{$appoints->doctor}}</td>
            <td style="padding:10px;  color:black;">{{$appoints->date}}</td>
            <td style="padding:10px;  color:black;">{{$appoints->message}}</td>
            <td style="padding:10px;  color:black;">{{$appoints->status}}</td>
            <td><a class="btn btn-danger" onclick="return confirm('are you sure want to delete this')" href="{{url('cancel_appoint',$appoints->id)}}">Cancel</a></td>
        </tr>
        @endforeach
    </table>
</div>
          
@include('layouts.user.footer')
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
</body>
</html>