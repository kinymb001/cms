<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Carbon;

class PostController extends Controller
{
    private Post $posts;
    public function __construct()
    {
        $this->posts = new Post();
    }

    public function index(){
        $postList = $this->posts->getAllPosts();
        return view('post.index', compact('postList'));
    }

    public function create(){
        return view('post.add');
    }

    public function post(Request $req){
        $current = Carbon::now();
        $dataList = [
            $req->name,
            $req->describe,
            $req->category_id,
            $req->tag_id,
            $current
        ];
        $this->posts->addPost($dataList);
        return redirect()->route('posts.index');
    }

    public function getEdit(Request $req){
        $id = $req->id;
        return view('post.edit',['id'=>$id]);
    }

    public function postEdit(Request $req){
        $current = Carbon::now();
        $id = $req->id;
        $dataList = [
            $req->name,
            $req->describe,
            $req->category_id,
            $req->tag_id,
            $current,
            $id
        ];
        $this->posts->edit($dataList);
        return redirect()->route('posts.index');
    }

    public function deletePost(Request $req){
        $id = $req->id;
        $this->posts->deletePost($id);
        return redirect()->route('tags.index');
    }
}
