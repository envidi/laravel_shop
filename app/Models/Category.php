<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function getAllCategories(){
        $categories = DB::select('SELECT * FROM '.$this->table.' ORDER BY created_at');
        return $categories;
    }
    public function addCategory($data){
        DB::insert('INSERT INTO '.$this->table .' (name ,created_at) values ( ?, ?)',$data);
    }
    public function getOneCategory($id){
        $categoryDetail = DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);

        return $categoryDetail;
    }
    public function updateCategory($data,$id){

        $data[]  = $id;
        return DB::update('UPDATE '.$this->table.' SET name=?, created_at=? WHERE id = ?',$data);
    }
    public function deleteCategory($id){
        
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?',[$id]);
    }
}
