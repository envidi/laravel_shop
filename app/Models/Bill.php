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
        ->where('status', '!=', 'Cancle')
        ->get();
        $arrayData = array_map(function($item) {
            return (array)$item; 
        }, $bill_user->toArray());
        return  $arrayData;
    }
    public function deleteBillDB($id){
        
        $delete_bill = DB::table($this->table)->where('id', '=', $id)->delete();
        return $delete_bill;
    }
    public function getAllBillDB(){
        
        $bill_user = DB::table($this->table)->get();
        $arrayData = array_map(function($item) {
            return (array)$item; 
        }, $bill_user->toArray());
        return  $arrayData;
    }
    public function getSingleBillDB($id){
        
        $bill_user = DB::table($this->table)->where('id', '=', $id)->get();
        $arrayData = array_map(function($item) {
            return (array)$item; 
        }, $bill_user->toArray());
        return  $arrayData;
    }
    public function updateStatusBill($status,$id){
        
        $result = DB::table($this->table)
        ->where('id', $id)
        ->update(['status' => $status]);
        return $result;
    }
}
