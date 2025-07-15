<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="ghibli">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Page Title' }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')

  @livewireStyles
</head>
<body class="flex flex-col min-h-screen">
  {{-- Navbar Start--}}
  <nav class="navbar rounded-box shadow-base-300/20 shadow-sm">
    <div class="w-full md:flex md:items-center md:gap-2">
      <div class="flex items-center justify-between">
        <div class="navbar-start items-center justify-between max-md:w-full">
          <a class="link text-base-content link-neutral text-xl font-bold no-underline" href="{{ route('index') }}"
             wire:navigate>ShortBae</a>
          <div class="md:hidden">
            <button type="button" class="collapse-toggle btn btn-outline btn-secondary btn-sm btn-square"
                    data-collapse="#navbar-collapse" aria-controls="navbar-collapse"
                    aria-label="Toggle navigation">
              <span class="icon-[tabler--menu-2] collapse-open:hidden size-4"></span>
              <span class="icon-[tabler--x] collapse-open:block hidden size-4"></span>
            </button>
          </div>
        </div>
      </div>
      <div id="navbar-collapse"
           class="md:navbar-end collapse hidden grow basis-full overflow-hidden transition-[height] duration-300 max-md:w-full">
        <ul class="menu md:menu-horizontal gap-2 p-0 text-base max-md:mt-2">
          @if(\Illuminate\Support\Facades\Auth::check())
          <li><a href="{{ route('profile') }}" wire:navigate>Akun</a></li>
          @endif
          <li><a href="{{ route('create.url') }}" wire:navigate>Create Url</a></li>
          <li><a href="{{ route('riwayat.url') }}" wire:navigate>Riwayat Url</a></li>
          @if(\Illuminate\Support\Facades\Auth::check())
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="link link-error no-underline w-full text-left">Logout</button>
              </form>
            </li>
          @endif
          {{--                    Dropdown--}}
          {{--                    <li class="dropdown relative inline-flex [--auto-close:inside] [--offset:8] [--placement:bottom-end]">--}}
          {{--                        <button id="dropdown-link" type="button"--}}
          {{--                                class="dropdown-toggle dropdown-open:bg-base-content/10 dropdown-open:text-base-content"--}}
          {{--                                aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">--}}
          {{--                            Parent--}}
          {{--                            <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>--}}
          {{--                        </button>--}}
          {{--                        <ul class="dropdown-menu dropdown-open:opacity-100 hidden" role="menu"--}}
          {{--                            aria-orientation="vertical" aria-labelledby="dropdown-link">--}}
          {{--                            <li><a class="dropdown-item" href="#">Link 3</a></li>--}}
          {{--                            <li><a class="dropdown-item" href="#">Link 4</a></li>--}}
          {{--                            <li><a class="dropdown-item" href="#">Link 5</a></li>--}}
          {{--                            <hr class="border-base-content/25 -mx-2"/>--}}
          {{--                            <li><a class="dropdown-item" href="#">Link 6</a></li>--}}
          {{--                        </ul>--}}
          {{--                    </li>--}}
        </ul>
      </div>
    </div>
  </nav>
  {{-- Navbar End--}}


  {{-- Main Start--}}
  <div class="flex-grow mx-auto w-10/12 my-9">
    {{ $slot }}
  </div>
  {{-- Main End--}}

  {{-- Footer Start--}}
  <footer class="footer bg-base-200/60 items-center rounded-t-box px-6 py-4 shadow-base-300/20 shadow-sm">
    <aside class="grid-flow-col items-center">
      <p>
        &copy;{{ \Carbon\Carbon::now()->year }}
        <a class="link link-hover font-medium" href="#">ShortBae</a> —
        Dibuat oleh
        <a class="link link-hover font-medium text-primary" href="https://instagram.com/namakamu" target="_blank"
           rel="noopener">
          Raihan Firdaus
        </a>
      </p>
    </aside>
    <nav class="text-base-content grid-flow-col gap-4 md:place-self-center md:justify-self-end">
      <a class="link link-hover" href="https://github.com/rh203/shortbae" target="_blank" rel="noopener">Repo</a>
      {{--      <a class="link link-hover" href="#">License</a>--}}
      <a class="link link-hover" href="https://github.com/rh203/shortbae" target="_blank" rel="noopener">
        Star this project on GitHub 🚀
      </a>
      <a class="link link-hover" href="#">Contact</a>
      {{--      <a class="link link-hover" href="#">Policy</a>--}}
    </nav>
  </footer>
  {{-- Footer End--}}


  @livewireScripts
</body>
</html>
