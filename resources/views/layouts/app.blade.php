<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
   <style>
     
    </style>
    </head>
   
<body>

<x-navbar />


<div class="container mt-4" >

    @yield('content')
</div>



<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
