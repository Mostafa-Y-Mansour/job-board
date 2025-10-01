<x-layout-simple :title="$pageTitle">
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <a href="/">
          <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company"
            class="mx-auto h-10 w-auto" />
        </a>
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Login with your Account</h2>
      </div>
      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form action="/login" method="POST" class="space-y-6">
          @csrf

          {{-- email --}}
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
            <div class="mt-2">
              <input id="email" type="email" name="email" required autocomplete="email"
                value="{{ old('email') }}"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
          </div>

          {{-- password --}}
          <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>

            <div class="mt-2">
              <input id="password" type="password" name="password" required autocomplete="current-password"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
          </div>



          {{-- errors --}}
          @if ($errors->any)
            @foreach ($errors->all() as $error)
              <div class="text-red-500 text-sm">

                {{ $error }}

              </div>
            @endforeach
          @endif

          <div>
            <button type="submit"
              class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
              Login
            </button>
          </div>
        </form>
        <div class="mt-4 text-sm  font-medium text-gray-600">
          <p>Don't have an account?</p>
          <p>Create a new account now
            <a href="/signup" class="text-indigo-400 hover:text-indigo hover:underline">
              here</a>.
          </p>
        </div>
      </div>
    </div>

</x-layout-simple>
