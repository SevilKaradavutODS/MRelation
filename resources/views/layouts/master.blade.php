<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ODS</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets') }}/admin/plugins/fontawesome-free/css/all.min.css">
  

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/admin/dist/css/adminlte.min.css">

  @yield('css')
</head>
<body>
@include('home.header')
@include('home.sidebar')
@yield('content')

@include('home.footer')
</body>
</html>