<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jop board{{ isset($title) ? ' - ' . $title : '' }}</title>

  <!-- Tailwind Css CDN -->
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>

  <!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> -->
  <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
  <div class="min-h-full">
    <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="shrink-0">
              <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company" class="size-8" />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->

                <x-nav-link href="/" aria-current="page" :active="request()->is('/')">
                  home
                </x-nav-link>
                <x-nav-link href="/about" aria-current="page" :active="request()->is('about')">
                  about
                </x-nav-link>
                <x-nav-link href="/contact" aria-current="page" :active="request()->is('contact')">
                  contact
                </x-nav-link>
                <x-nav-link href="/blog" aria-current="page" :active="request()->is('blog')">
                  Blog
                </x-nav-link>

              </div>
            </div>
          </div>

          <div class="hidden md:block">
            <div class="ml-4 flex items-center md:ml-6">
              @auth
                <span class="text-white mx-2">{{ Auth::user()->name }}</span>
                <form action="/logout" method="post">
                  @csrf
                  <button
                    class="rounded-md bg-red-600 mx-2 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    logout
                  </button>
                </form>
              @else
                <a href="/login" class="text-gray-400 hover:text-white mx-2">
                  Login
                </a>
                <a href="/signup"
                  class="rounded-md bg-indigo-600 mx-2 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  Sign up
                </a>
              @endauth

            </div>
          </div>

          <div class="-mr-2 flex md:hidden">
            <!-- Mobile menu button -->
            <button type="button" command="--toggle" commandfor="mobile-menu"
              class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
              <span class="absolute -inset-0.5"></span>
              <span class="sr-only">Open main menu</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                aria-hidden="true" class="size-6 in-aria-expanded:hidden">
                <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon"
                aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="md:hidden" id="mobile-menu">

        <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
          <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
          <x-nav-link href="/" aria-current="page" :active="request()->is('/')">
            home
          </x-nav-link>
          <x-nav-link href="/about" aria-current="page" :active="request()->is('about')">
            about
          </x-nav-link>
          <x-nav-link href="/contact" aria-current="page" :active="request()->is('contact')">
            contact
          </x-nav-link>
          <x-nav-link href="/blog" aria-current="page" :active="request()->is('blog')">
            Blog
          </x-nav-link>

          <div class="mt-4 flex items-center justify-evenly md:ml-6 ">
            @auth
              <span class="w-1/2 text-center text-white mx-2">{{ Auth::user()->name }}</span>
              <form action="/logout" method="post" class="w-1/2 mx-2">
                @csrf
                <button
                  class=" w-full text-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                  logout
                </button>
              </form>
            @else
              <a href="/login" class="w-1/2 text-center text-gray-400 hover:text-white mx-2">
                Login
              </a>
              <a href="/signup"
                class="w-1/2 text-center rounded-md bg-indigo-600 mx-2 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Sign up
              </a>
            @endauth

          </div>
        </div>



      </div>



    </nav>

    @if (isset($title) && $title !== '')
      <header class="relative bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $title ?? '' }}</h1>
        </div>
      </header>
    @endif
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <!-- Your content -->
        {{ $slot }}
      </div>
    </main>
  </div>


</body>

</html>
