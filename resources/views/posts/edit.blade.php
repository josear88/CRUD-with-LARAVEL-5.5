@extends('layouts.app')

@section('content')
  <form action="{{ route('update_post_path', ['post' => $post->id ]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('PUT') }}
      <div class="col-md-12">
          <label for="content">Descripcion</label><br>
          <textarea name="content" id="content" cols="120" rows="5">{{ $post->content}}</textarea>

      </div>

      <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Edit Post</button>
      </div>

  </form>

@endsection
