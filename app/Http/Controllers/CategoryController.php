<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    private Category $categories;

    public function __construct()
    {
        $this->categories = new Category();
    }

    public function index(){
        $categoriesList = $this->categories->getAllCategories();
        return view('category.index', compact('categoriesList'));
    }

    public function create(){
        return view('category.add');
    }

    public function post(Request $req){
        $current = Carbon::now();
        $dataList = [
            $req->name,
            Str::of($req->name)->slug('-'),
            $current
        ];
        $this->categories->addCategory($dataList);
        return redirect()->route('categories.index');
    }

    public function getEdit(Request $req){
        $id = $req->id;
        return view('category.edit', ['id'=>$id]);
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
        $this->categories->editCategory($dataList);
        return redirect()->route('categories.index');
    }

    public function deletedCategory(Request $req){
        $id = $req->id;
        $this->categories->deleteCategory($id);
        return redirect()->route('categories.index');
    }
}
