<x-layout :title="$pageTitle">
  <h2>comment by: {{$comment->author}} !</h2>
  <p>{{$comment->content}}</p>

  @if ($comment->post)
  @php
  
  $post = $comment->post;
  @endphp
    <br>
    <h3>Related Post</h3>

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>
    
  @endif
</x-layout>