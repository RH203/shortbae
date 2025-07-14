<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="ghibli" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Page Title' }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  @livewireStyles
</head>
<body>
  {{-- Main Start--}}
  <div class="mx-auto w-10/12 my-9">
    {{ $slot }}
  </div>
  {{-- Main End--}}

  @livewireScripts
</body>
</html>
