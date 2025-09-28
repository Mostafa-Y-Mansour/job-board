<x-layout :title="$pageTitle">

  @if (session('success'))
    <div class="bg-green-50 px-3 py-2">
      <p>{{ session('success') }}</p>
    </div>
  @endif

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a href="/blog/create"
      class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
      Create New Post
    </a>
  </div>

  @foreach ($posts as $post)
    <div class="flex justify-between items-center border border-gray-200 my-2 px-2 py-4">

      <div>
        <a href="/blog/{{ $post->id }}">
          <h1 class="text-2xl hover:underline">{{ $post->title }}</h1>
        </a>
        <p>By: {{ $post->author }}</p>
      </div>
      <div class="">
        <a href="/blog/{{ $post->id }}/edit" class=" text-yellow-500 hover:text-gray-500">Edit</a>
        <span class="text-gray-500">|</span>

        <form method="POST" action="/blog/{{ $post->id }}"
          onsubmit="return confirm('Are you sure you want to delete this Post?')">
          @csrf
          @method('DELETE')

          <button type="submit" class="text-red-500 hover:text-gray-500">Delete</button>
        </form>

      </div>
    </div>
  @endforeach

  <div>

    {{ $posts->links() }}
  </div>
</x-layout>
