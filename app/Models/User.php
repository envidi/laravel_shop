<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    public function getAllUsers()
    {
        $users = DB::select('SELECT * FROM ' . $this->table . ' ORDER BY created_at');
        return $users;
    }
    public function addUser($data)
    {
        DB::insert('INSERT INTO users (name , email , password, created_at, updated_at) values ( ?, ?, ?, ?,? )', $data);
    }
    public function updateUser($data, $id)
    {

        $data[]  = $id;
        return DB::update('UPDATE ' . $this->table . ' SET name=?, email=?, password=? WHERE id = ?', $data);
    }
    public function getOneUser($id)
    {
        $userDetail = DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);

        return $userDetail;
    }
}
