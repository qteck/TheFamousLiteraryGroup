@extends('layout') 

@section('content')

@foreach($articles as $article)
<h2><a href="article/{{ str_slug($article->title, '-') }}/{{ $article->id }}" class="text-dark">{{ $article->title }}</a></h2>
<div class="place-time text-left">{{ $article->place }}</div>
{!! $article->article !!}
@endforeach

@endsection