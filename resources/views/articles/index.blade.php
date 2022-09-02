@extends('layouts.app')

@section("content")

    <div class="container">

     @if(session('info'))
        <div class="alert alert-info">
            {{session('info')}}
        </div>
     @endif

        {{$articles->links()}}

        @foreach($articles as $article)
        <div class="card mb-2">
        <div class="card-body">
            <h1 class="h5 card-title mb-2">
                {{$article->title}}
            </h1>
            <div class="card-subtitle small text-muted mb-2">
                {{$article->created_at->diffForHumans()}}
            </div>
            <p class="card-text">
                {{$article->body}}
            </p>
            <a class="card-link" 
                href='{{url("/articles/detail/$article->id")}}'>
                View Detail &raquo
            </a>
        </div>
        </div>
        @endforeach
    </div>

@endsection