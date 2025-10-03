<x-layout :title="$pageTitle">
  <form method="POST" action="/blog">
    {{-- @csrf for security to help with cross-site request forgery --}}
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Create New Post</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Use this Form to publish a new post.</p>

        {{-- @if ($errors->any())
          <ul>
            @foreach ($errors->all() as $error)
              <li class="text-red-500">{{ $error }}</li>
            @endforeach
          </ul>
        @endif --}}

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-full">
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <div class="mt-2">
              <input id="title" type="text" name="title" autocomplete="" value="{{ old('title') }}"
                class="{{ $errors->has('title') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            @error('title')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>


          <div class="col-span-full">
            <label for="content" class="block text-sm/6 font-medium text-gray-900">content</label>
            <div class="mt-2">
              <textarea id="content" name="body" rows="3"
                class=" {{ $errors->has('body') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('body') }}</textarea>
            </div>
            @error('body')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
          </div>

          <div class="col-span-full ">
            <div class="flex gap-3">

              <div class="flex h-6 shrink-0 items-center">
                <div class="group grid size-4 grid-cols-1">
                  <input id="published" type="checkbox" name="published" aria-describedby="published-description"
                    class="col-start-1 row-start-1 appearance-none rounded-sm border border-gray-300 bg-white checked:border-indigo-600 checked:bg-indigo-600 indeterminate:border-indigo-600 indeterminate:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 disabled:border-gray-300 disabled:bg-gray-100 disabled:checked:bg-gray-100 forced-colors:appearance-auto" />
                  <svg viewBox="0 0 14 14" fill="none"
                    class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-white group-has-disabled:stroke-gray-950/25">
                    <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="opacity-0 group-has-checked:opacity-100" />
                    <path d="M3 7H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                      class="opacity-0 group-has-indeterminate:opacity-100" />
                  </svg>
                </div>
              </div>
              <div class="text-sm/6">
                <label for="published" class="font-medium text-gray-900">Publish</label>
                <p id="published-description" class="text-gray-500">
                  Do you want to publish or save as draft?
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/blog" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>

</x-layout>
