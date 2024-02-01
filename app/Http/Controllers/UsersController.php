<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new User();
    }

    public function index(Request $request)
    {
        $usersList = $this->users->getAllUsers();
        return view('admin.users.usersList', compact('usersList'));
    }

    // add users
    public function addUser(Request $request)
    {
        return view('admin.users.userAdd');
    }
    public function handleAddUser(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:5',


        ], [
            'name.required' => 'Name is not allowed to empty',
            'email.required' => 'Email is not allowed to empty',
            'password.required' => 'Password is not allowed to empty'
        ]);

        $dataInsert = [
            $request->name,
            $request->email,
            $request->password,
            date('Y-m-d H:i:s'),
            date('Y-m-d H:i:s')
        ];

        $this->users->addUser($dataInsert);

        return redirect()->route('admin.users')->with('msg', 'Thêm sản tài khoản thành công!');
    }
    public function editUser($id = 0)
    {
        if (!empty($id)) {
            $userDetail = $this->users->getOneUser($id)[0];
            return view('admin.users.userEdit', compact('userDetail'));
        } else {
            return redirect()->route('admin.users')->with('msg', 'Liên kết không tồn tại');
        }
    }
    public function handleEditUser(Request $request, $id = 0)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'password' => 'required|min:5'


        ], [
            'name.required' => 'Name is not allowed to empty',
            'email.required' => 'Email is not allowed to empty',
            'password.required' => 'Password is not allowed to empty'
        ]);

        $dataUpdate = [
            $request->name,
            $request->email,
            $request->password
        ];

        $this->users->updateUser($dataUpdate, $id);

        return  redirect()->route('admin.users', ['id' => $id])->with('msg', 'Update successfully');
    }
}
