<x-layout :title="$pageTitle">
  <h2>Blog page!</h2>
  @foreach ($posts as $post)
  <br>
    <h1 class="text-3xl">{{ $post->title }}</h1>
    <p class="font-bold">By: {{ $post->author }}</p>
    <p>{{ $post->body }}</p>
    <ul>
      @foreach ( $post->comments as $comment)
      <hr>
      @if ($comment)  
      <h3 class="text-2xl">Comments</h3>
      @endif
      <li>
        <p class="text-red-400">{{ $comment->content }}</p>
        <p class="text-blue-400">By: {{ $comment->author }}</p>
      </li>
      <hr>
      @endforeach
      
    </ul>
  @endforeach
<div>

  {{$posts->links()}}
</div>
</x-layout>