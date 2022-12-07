<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public function getAllPosts(){
        return DB::select('select * from posts');
    }
    public function addPost($data){
        DB::insert('insert into  posts (name, description, category_id, tag_id, created_at) values (?, ?, ?, ?, ?)', $data);
    }
    public function edit($data){
        DB::update('update posts set name=?, description=?, category_id=?, tag_id=?, updated_at=? where id = ?', $data);
    }
    public function deletePost($id){
        DB::delete('delete from posts where id = ?', [$id]);
    }
}
