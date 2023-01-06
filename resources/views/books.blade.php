@extends('layout') 

@section('title', 'Books -')

@section('content')

@php
	$i = 0;
	$numberOfBooks = count($books);
@endphp

<h2>Books</h2>

@foreach($books as $book)

@if ($i == 0 || ($i % 2 != 0 and $i != 0))
	<div class="container m-0 p-0 text-left">
	<div class="row">
@endif

@php
   $class = ($i==0 || ($i % 2 != 0 and $numberOfBooks-1 == $i))?'h2s':'h2';
@endphp

<div class="col-md mb-5">
   <div class="p-3 border">
      <div class="row">
         <div class="col-sm">
            <img src="{{ $book->cover_img }}" class="img-fluid" alt="The Man">
         </div>
         <div class="col-sm">
            <div class="text-center mb-3 mt-5 mt-sm-0">
               <div class="{{ $class }}">
               <a href="books/{{ str_slug($book->title, '-') }}/{{ $book->id }}" class="text-dark">{{ $book->title }}</a>
               </div>
            </div>
            <strong class="h2">Contents:</strong>
            <ul class="mt-3 list-group list-group-flush">
               @foreach($book->books_content as $content)
               <li class="list-group-item">
                  <a href="books/{{ str_slug($book->title, '-') }}/{{ str_slug($content->title, '-') }}/{{ $content->id }}#title" class="text-dark">
                     {{ $content->title }}
                  </a>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</div>

@if ($i == 0 || ($i % 2 == 0 and $i != 0) || ($i == ($numberOfBooks-1)))
	</div>
	</div>
@endif

@php
	$i++;
@endphp

@endforeach

@endsection




