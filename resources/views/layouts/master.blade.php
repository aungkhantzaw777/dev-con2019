<html lang="en">

<head>
     
  <title>@yield('title', 'Devcon')| DevCon Yangon 2019 (Myanmar)</title>
  <meta name="description" content="@yield('title', 'Devcon')" />
  

  {{-- <title>DevCon Yangon 2019 (Myanmar)</title>
  <meta name="description" content="" /> --}}

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Design 33</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/3ad86ccf86.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Title -->

    <!-- Favicon -->
    <link rel="icon" href="/img/devcon-new.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/css/style1.css">

</head>



@include('layouts.menu')

@yield('content')

@include('layouts.footer') 