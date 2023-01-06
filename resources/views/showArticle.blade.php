@extends('layout') 

@section('title', $title . ' -')
@section('content')

<h2>{{ $article->title }}</h2>
<div class="place-time text-left">{{ $article->place }}</div>
{!! $article->article !!}

@endsection