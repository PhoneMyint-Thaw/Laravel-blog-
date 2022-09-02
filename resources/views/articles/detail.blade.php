@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <h1 class="h5 mb-2">
                    {{$article->title}}
                </h1>
                <div class="small text-muted mb-2 card-subtitle">
                    {{$article->created_at->diffForHumans()}}
                    Category: {{$article->category->name}}
                </div>
                <p class="card-text mb-2">
                    {{$article->body}}
                </p>
                <a class="btn btn-warning" 
                    href='{{url("/articles/delete/$article->id")}}'>
                    Delete
                </a>
            </div>
        </div>

        <ul class="list-group">
            <li class="list-group-item active">
                <b>Comments: ( {{count($article->comments) }} )</b>
            </li>
            @foreach($article->comments as $comment)
            <li class="list-group-item">
                <a href='{{ url("/comments/delete/$comment->id") }}'
                class="btn-close float-end">
                </a>
               {{$comment->content}}
               <div class="small">
                By <b>{{$comment->user->name}}</b>
                {{$comment->created_at->diffForHumans()}}
               </div>
            </li>
            @endforeach
        </ul>


       
        <form action="{{url('/comments/add')}}" method="post">
            @csrf
            <input type="hidden" value="{{ $article->id }}" name="article_id">
            <textarea name="content" class="form-control mb-2" placeholder="New Comment"></textarea>
            <input type="submit" class="btn btn-success" value="Add Comment">
        </form>
       
    </div>
@endsection