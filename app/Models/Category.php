<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    public function getAllCategories(): array
    {
        return DB::select("SELECT * FROM categories");
    }
    public function addCategory($data){
        DB::insert('insert into  categories (name, slug, created_at) values (?, ?, ?)', $data);
    }
    public function getCategory($id){
        DB::select('select * from categories where id = ?', $id);
    }
    public function editCategory($data){
        DB::update('update categories set name=?, slug=?, updated_at=? where id = ?', $data);
    }
    public function deleteCategory($id){
        DB::delete('delete from categories where id = ?', [$id]);
    }

}
