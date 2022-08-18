@extends('master')
@section("content")
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="p-5 card">
                @foreach($tags as $tag)
                    <h2>{{$tag->name}}</h2>
                    <ul>
                        @foreach($tag->posts as $post)
                            <li>{{$post->title}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection