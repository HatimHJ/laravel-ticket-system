<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])



</head>

<body class="antialiased">

  {{-- navbar  --}}
  <section class=" flex justify-between items-center bg-gray-200 shadow-sm py-2 px-8 sm:px-8 ">
    <div class="logo">
      <h3>logo</h3>
    </div>
    @if (Route::has('login'))
    <div class=" px-6 py-4 sm:block">
      @auth
      <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700  underline">Dashboard</a>
      @else
      <a href="{{ route('login') }}" class="font-bold text-gray-900 bg-green-300 hover:bg-green-400 py-2 px-4 ">add ticket</a>


      {{-- @if (Route::has('register'))
      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
      @endif --}}
      @endauth
    </div>
    @endif

  </section>
  {{-- hero  --}}
  <section class="flex flex-col items-center justify-center h-96 hero text-center text-white">
    <h1 class="font-bold text-4xl mb-4">Insert Title Here...</h1>
    <p class="leading-6 text-lg max-w-md">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempora cumque perspiciatis minima ullam saepe error unde, repudiandae facere ratione. Saepe.</p>
  </section>
  {{-- about  --}}
  <section class="about py-12 text-center contianer px-8 sm:px-0">

    <h2 class="font-bold text-4xl mb-4 ">About us</h2>
    <p class="leading-6 mx-auto max-w-2xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, quisquam delectus! Esse fugit provident impedit earum repellendus ab, magni molestiae sed quae aliquam nostrum eius assumenda dolorem perspiciatis amet dolor culpa asperiores aspernatur vitae molestias maiores minus nobis. Animi nemo minima qui minus voluptates nostrum magnam quasi, molestias itaque nulla?</p>
  </section>
</body>
</html>
