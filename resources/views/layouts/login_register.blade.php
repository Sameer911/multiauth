<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('Admin/css/app.min.css')}}">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('Admin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('Admin/css/components.css')}}">


  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('Admin/css/custom.css')}}">

  <link rel='shortcut icon' type='image/x-icon' href='{{asset('Admin/img/favicon.ico')}}' />

</head>

<body>

    <div id="app">
    @yield('content')    
    </div>


    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
  </body>
  
  
  <!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
  </html>