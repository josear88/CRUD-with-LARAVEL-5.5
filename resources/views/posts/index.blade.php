@extends('layouts.app')

@section('content')
  @foreach($posts as $post)
    <div class="row">
        <div class="col-md-12">

            <h2><a href="{{ route('post_path', ['post' => $post->id]) }}"> Ref:{{ $post->id }}</a></h2>
            @if(Auth::check() && $post->user_id == Auth::user()->id)
            <small class="pull-right">
                <a class="btn btn-info" href="{{ route('edit_post_path', ['post' => $post->id]) }}" role="button">Edit</a>
                <form action="{{ route('delete_post_path', ['post' => $post->id ]) }}" method="POST" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger" >Delete</button>
                </form>
            </small>
            @endif
            <p>{{ $post->content}}</p>
            <em>Posteado {{ $post->created_at->diffForHumans() }}</em>
            <hr>

        </div>
    </div>
  @endforeach
  {{ $posts->links() }}

@endsection
