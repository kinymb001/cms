<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class TagController extends Controller
{
    private Tag $tags;

    public function __construct()
    {
        $this->tags = new Tag();
    }
    public function index()
    {
        $tagList = $this->tags->getAllTags();
        return view('Tag.index', compact('tagList'));
    }

    public function create(){
        return view('Tag.add');
    }

    public function post(Request $req){
        $current = Carbon::now();
        $dataList = [
            $req->name,
            Str::of($req->name)->slug('-'),
            $current
        ];
        $this->tags->addTag($dataList);
        return redirect()->route('tags.index');
    }

    public function getEdit(Request $req){
        $id = $req->id;
        return view('Tag.edit',['id'=>$id]);
    }

    public function postEdit(Request $req){
        $current = Carbon::now();
        $id = $req->id;
        $dataList = [
            $req->name,
            Str::of($req->name)->slug('-'),
            $current,
            $id
        ];
        $this->tags->edit($dataList);
        return redirect()->route('tags.index');
    }
}
