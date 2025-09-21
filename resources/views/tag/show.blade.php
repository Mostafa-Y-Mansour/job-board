$tag$tag<x-layout :title="$pageTitle">
  <h2>{{$tag->title}} !</h2>

  @if ($tag->post)
  @php
  
  $post = $tag->post;
  @endphp
    <br>
    <h3>Related Post</h3>

    <h2>{{ $post->title }}</h2>
    <p>{{ $post->body }}</p>
    <p>{{ $post->author }}</p>
    
  @endif
</x-layout>