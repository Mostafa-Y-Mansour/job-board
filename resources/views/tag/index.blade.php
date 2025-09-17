<x-layout :title="$pageTitle">
  <h2>Tags!</h2>
  @foreach ($tags as $tag)
  <p>{{$tag->title}}</p>
  @endforeach
</x-layout>