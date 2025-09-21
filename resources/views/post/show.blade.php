<x-layout :title="$pageTitle">
  <h2>{{ $post->title }}</h2>

  <p>{{ $post->body }}</p>
  <p>{{ $post->author }}</p>
  <ul>

    @foreach ( $post->comments as $comment)
    <li>
      <p>{{ $comment->content }}</p>
      <p>By: {{ $comment->author }}</p>
    </li>
    @endforeach


</x-layout>