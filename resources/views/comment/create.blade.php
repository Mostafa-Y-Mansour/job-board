<x-layout :title="$pageTitle">
  <h2>comment create page!</h2>
  <p>post id : {{ request()->input('post_id') }}</p>

  <form method="POST" action="/comments">
    {{-- @csrf for security to help with cross-site request forgery --}}
    @csrf

    <input type="hidden" name="post_id" value="{{ request()->input('post_id') }}">

    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Create New comment</h2>
        <p class="mt-1 text-sm/6 text-gray-600">Use this Form to publish a new post.</p>

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


          {{-- author field --}}
          <div class="sm:col-span-3">
            <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
            <div class="mt-2">
              <input id="author" type="text" name="author" autocomplete="given-name" value="{{ old('author') }}"
                class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
            @error('author')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
          </div>

          {{-- content field --}}
          <div class="col-span-full">
            <label for="content" class="block text-sm/6 font-medium text-gray-900">content</label>
            <div class="mt-2">
              <textarea id="content" name="content" rows="3"
                class=" {{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
            </div>
            @error('content')
              <span class="text-red-500">{{ $message }}</span>
            @enderror
            <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
          </div>
        </div>
      </div>

    </div>

    {{-- submission field --}}
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/blog" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
      <button type="submit"
        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
  </form>
</x-layout>
