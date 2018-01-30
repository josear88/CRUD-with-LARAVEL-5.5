<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index(){
      $posts = Post::orderBy('id','desc')->paginate(10);
      return view('posts.index',['posts'=>$posts]);
    }
    public function show($postId){
        $post = Post::find($postId);
        if(is_null($post)){
            return abort(404);
        }
        return view('posts.show', ['post' => $post]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'content' => 'required'
        ]);

        $post = new Post;
        $post->content = $request->get('content');
        $post->user_id = $request->user()->id;
        $post->save();
        session()->flash('message','Creado Correctamente');
        return redirect()->route('posts_path');
    }

    public function edit(Post $post){

        return view('posts.edit',['post' =>$post]);
    }

    public function update(Post $post, Request $request){

        $this->validate($request, [
            'content' => 'required'
        ]);

        if($post->user_id != $request->user()->id){
          return redirect()->route('posts_path');
        }

        $post->content = $request->get('content');
        $post->save();

        return redirect()->route('post_path', ['post' => $post->id]);
    }

    public function delete(Post $post){

        if($post->user_id == \Auth::user()->id){
          $post->delete();
          session()->flash('message','Eliminado Correctamente');
          return redirect()->route('posts_path');
        }

    }
}
