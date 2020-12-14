@extends('layouts.app')


@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach (App\Post::latest()->get() as $post)
                 <div class="card">
                    <div class="card-header">
                        <a href="{{route('posts.show', $post)}}">
                            {{$post->title}}
                        </a>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection