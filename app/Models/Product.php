<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // protected $fillable = [
    //     'id',
    //     'name',
    //     'price',
    //     'description',
    //     'image',
    //     'is_active'
    // ];

    public function getAllProducts()
    {
        $products = DB::table($this->table)->select('products.*', 'categories.name as category_name')->join('categories', 'products.category_id', '=', 'categories.id')
            ->get();

        return $products;
    }
    public function getAllProductsByCate($id)
    {
        $products = DB::table($this->table)->where('category_id', $id)->get();

        return $products;
    }
    public function addProduct($data)
    {
        DB::insert('INSERT INTO products (name , price , description , image , category_id , created_at) values ( ?, ?, ?, ?,?, ? )', $data);
    }
    public function getOneProduct($id){
        $productDetail = DB::select('SELECT * FROM '.$this->table.' WHERE id = ?',[$id]);

        return $productDetail;
    }
    public function getSingleProduct($id){
        $productDetail = DB::table($this->table)->select('products.*','categories.name as category_name')->where('products.id','=',$id)->join('categories','products.category_id','=','categories.id')->get();

        return $productDetail;
    }
    public function updateProduct($data, $id)
    {

        $data[]  = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name=?, price=?, description=?, image=?, category_id=? ,created_at=? WHERE id = ?', $data);
    }
    public function deleteProduct($id)
    {

        return DB::delete('DELETE FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }
}
