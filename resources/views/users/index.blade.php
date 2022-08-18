@extends('master')
@section("content")
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{--@foreach($users as $user)
                    <h2>{{$user->name}}</h2>
                    <p>{{$user->address->country}}</p>
                @endforeach--}}

                {{--@foreach($addresses as $address)
                    <h2>{{$address->country}}</h2>
                    <p>{{$address->owner->name}}</p>
                @endforeach--}}
                
                {{--Getting users adrresses (one to many)--}}
                {{--@foreach($users as $user)
                    <h2>{{$user->name}}</h2>
                    @foreach($user->addresses as $address)
                        <p>{{$address->country}}</p>
                    @endforeach
                @endforeach--}}

                {{--Getting users posts--}}
                @foreach($users as $user)
                    <h2>{{$user->name}}</h2>
                    @foreach($user->posts as $post)
                        <p>{{$post->title}}</p>
                    @endforeach
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection