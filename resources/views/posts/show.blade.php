@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Ref:{{ $post->id }}</h2>
            <p>{{ $post->content}}</p>
            <em>Posteado {{ $post->created_at->diffForHumans() }}</em>
            <hr>
            </div>
    </div>
@endsection
