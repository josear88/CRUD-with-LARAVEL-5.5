@extends('layouts.app')

@section('content')
  <form action="{{ route('store_post_path') }}" method="POST">
    {{ csrf_field() }}
    <div class="col-md-12">
        <label for="content">Descripcion</label><br>
        <textarea name="content" id="content" cols="120" rows="5"></textarea>

    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Create Post</button>
    </div>

  </form>
@endsection
