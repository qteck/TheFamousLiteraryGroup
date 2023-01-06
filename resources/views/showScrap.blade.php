@extends('layout') 



@section('title', $title . ' -')

@section('content')

<h3 style="margin: 50px 0 0 0">{{ $scrap['title'] }}</h3>
<p class="text-center" style="font-size: 16px;letter-spacing: 3px;font-style: italic;">
    - <br>
    by {{ $scrap->user['name'] }}
</p>

{!! $scrap['scrap'] !!}

@endsection