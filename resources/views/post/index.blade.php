<x-layout :title="$pageTitle">
  <h2>Blog page!</h2>
  @foreach ($posts as $post)
    <h1 class="text-2xl">{{ $post->title }}</h1>
    <p class="font-bold">By: {{ $post->author }}</p>
    <p>{{ $post->body }}</p>
    <ul>

      @foreach ( $post->comments as $comment)
      <li>
        <p>{{ $comment->content }}</p>
        <p>By: {{ $comment->author }}</p>
      </li>
      @endforeach

  </ul>
  @endforeach
<div>

  {{$posts->links()}}
</div>
</x-layout>