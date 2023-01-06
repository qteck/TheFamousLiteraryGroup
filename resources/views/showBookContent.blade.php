@extends('layout')

@section('background', $singleContent->background_img)
@section('title',  $title . ' - ' . $bookTitle . ' -')

@section('content')

<div class="container m-0 p-0 text-left">
   <div class="row">
      <div class="col-md mb-5">
         <div class="p-3 border">
            <div class="row">
               <div class="col-sm">
                  <img src="{{ $singleContent->book->cover_img }}" class="img-fluid" alt="The Man">
               </div>
               <div class="col-sm">
                  <div class="text-center mb-3 mt-5 mt-sm-0">
                     <h2>
                        {{ $singleContent->book->title }}
                     </h2>
                  </div>
                  <strong class="h2">Contents:</strong>
                  <ul class="mt-3 list-group list-group-flush">
                     @foreach($contents as $content)
                     <li class="list-group-item">
                     	<a href="/books/{{ str_slug($singleContent->book->title, '-') }}/{{ str_slug($content->title, '-') }}/{{ $content->id }}#title" class="text-dark">
                     		{{ $content->title }}
                     	</a>
                     </li>
                     @endforeach

                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<h2 id="title">{{ $singleContent->title }}</h2>
<div class="place-time text-left">{{ $singleContent->place }}</div>
{!! $singleContent->article !!}


@endsection
