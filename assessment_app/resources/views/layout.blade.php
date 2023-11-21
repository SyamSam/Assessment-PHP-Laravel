<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Custom Authen Laravel')</title> <!--title name changes depending on the website-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body class="mx-auto p-2">
    @include('include.header') <!--Gets from header.blade.php-->
    @yield('content')<!-- For body stylesheet-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>
