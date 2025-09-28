<x-layout :title="$pageTitle">
  @if (session('success'))
    <div class="bg-green-50 px-3 py-2">
      <p>{{ session('success') }}</p>
    </div>
  @endif

  <h2>Post</h2>
  <div class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <img
        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
        alt="profile image"
        class="size-12 flex-none rounded-full bg-gray-800 outline -outline-offset-1 outline-black/10" />
      <div class="min-w-0 flex-auto">
        <p class="mt-1 truncate text-xs/5 text-gray-600">{{ $post->author }}</p>
        <p class="text-sm/8 font-semibold text-black">{{ $post->title }}</p>
        <p class="text-sm/6 font-semibold text-black">{{ $post->body }}</p>
      </div>
    </div>
    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
      <p class="text-sm/6 text-white">Co-Founder / CEO</p>
      <p class="mt-1 text-xs/5 text-gray-400">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
    </div>
  </div>

  <h4>comments</h4>
  <ul role="list" class="divide-y divide-black/5">
    @foreach ($post->comments as $comment)
      <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
          <img
            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt="profile image"
            class="size-12 flex-none rounded-full bg-gray-800 outline -outline-offset-1 outline-black/10" />
          <div class="min-w-0 flex-auto">
            <p class="mt-1 truncate text-xs/5 text-gray-600">{{ $comment->author }}</p>
            <p class="text-sm/6 font-semibold text-black">{{ $comment->content }}</p>
          </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
          <p class="text-sm/6 text-white">Co-Founder / CEO</p>
          <p class="mt-1 text-xs/5 text-gray-400">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
        </div>
      </li>
    @endforeach
  </ul>



  <div class="bg-gray-100 border border-gray-300 rounded-md p-4">

    <form method="POST" action="/comments">
      {{-- @csrf for security to help with cross-site request forgery --}}
      @csrf

      <input type="hidden" name="post_id" value="{{ $post->id }}">

      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
          <h2 class="text-base/7 font-semibold text-gray-900">Create New comment</h2>
          <p class="mt-1 text-sm/6 text-gray-600">Use this Form to publish a new post.</p>

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">


            {{-- author field --}}
            <div class="sm:col-span-3">
              <label for="author" class="block text-sm/6 font-medium text-gray-900">Author</label>
              <div class="mt-2">
                <input id="author" type="text" name="author" autocomplete="given-name"
                  value="{{ old('author') }}"
                  class="{{ $errors->has('author') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md  px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
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
                  class=" {{ $errors->has('content') ? 'outline-red-500' : 'outline-gray-300' }} block w-full rounded-md  px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">{{ old('content') }}</textarea>
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
  </div>

</x-layout>
