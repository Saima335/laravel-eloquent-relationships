@extends('master')
@section("content")
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($posts as $post)
                    <h2>{{$post->title}}</h2>
                    {{--Default name not given in post.php model--}}
                    {{--<p>{{optional($post->user)->name}}</p>--}}
                    <p>{{$post->user->name}}</p>
                    <ul>
                        @foreach($post->tags as $tag)
                            <li>{{$tag->name}} {{$tag->pivot->created_at}}</li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection