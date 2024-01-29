<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public function listCartDB($id_bill){
        $list_cart_DB = DB::table($this->table)
                    ->where('bill_id', '=', $id_bill)
                    ->get();
        return $list_cart_DB;
    }
    public function addCartDB($data){
        for ($i=0; $i < count($data); $i++) { 
            $data[$i]['created_at'] = date('Y-m-d H:i:s');
        }
        DB::table('cart')->insert($data);
    }
}
