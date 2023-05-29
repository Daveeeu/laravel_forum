@extends('layouts.app-master')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
@section('content')
<div class="bg-light p-5 rounded">
   
@auth
        <h1>Forum</h1>
        <p class="lead">Hozz létre új bejegyzést.</p>
        @include('layouts.partials.messages')        
@endauth
        
        @guest
        
        <h1>Főoldal</h1>
        <p class="lead">Jelentkezz be</p>
        
        @endguest
        
    </div>
    @include('layouts.partials.post')

    <div class="pagination">
        @if ($posts->onFirstPage())
            <span class="disabled">&laquo; Előző</span>
        @else
            <a href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo; Előző</a>
        @endif
    
        @if ($posts->hasMorePages())
            <a href="{{ $posts->nextPageUrl() }}" rel="next">Következő &raquo;</a>
        @else
            <span class="disabled">Következő &raquo;</span>
        @endif
    </div>


@endsection
