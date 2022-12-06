<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    public function getAllTags(){
        return DB::select('select * from tags');
    }

    public function addTag($data){
        return DB::insert('insert into tags (name, slug, created_at) values (?, ?, ?)', $data);
    }

    public function edit($data){
        DB::update('update tags set name=?, slug=?, updated_at=? where id = ?', $data);
    }

}
