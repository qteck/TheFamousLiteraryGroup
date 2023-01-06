@extends('layout') 

@section('content')
<h2>The Famous Translations</h2>
@foreach($articles as $article)

<h3><a href="/the-famous-translations/{{ str_slug($article->title, '-') }}/{{ $article->id }}" class="text-dark">{{ $article->title }}</a></h3>
<div class="place-time text-left">{{ $article->place }}</div>
{!! $article->article !!}
@endforeach

@endsection