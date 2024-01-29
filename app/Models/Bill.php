<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Bill extends Model
{
    use HasFactory;
    protected $table = 'bill';
    public function addBill($data){
                
        $id = DB::table('bill')->insertGetId(
            $data
        );
        return $id;
    }
    public function listBill($id_user){
        
        $bill_user = DB::table($this->table)
        ->where('user_id','=',$id_user)
        ->get();
        $arrayData = array_map(function($item) {
            return (array)$item; 
        }, $bill_user->toArray());
        return  $arrayData;
    }
}
