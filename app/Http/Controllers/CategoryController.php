<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //private $products;
    private $categories;
    private $products;
    public function __construct() {
        $this->categories = new Category();
        $this->products = new Product();
    }
    public function index(Request $request)
    {   
        $categoryList = $this->categories->getAllCategories();
        
        return view('clients.homeListCategory',compact('categoryList'));
    }

    public function addCategory()
    {
        
        return view('clients.homeAddCategory');
    }
    public function handleAddCategory(Request $request)
    {
        
        $request->validate([
            'name'=>'required|min:3',
        ], [
            'name.required'=>'Name is not allowed to empty',
        ]);
        
        $dataInsert = [
            $request->name,
            date('Y-m-d H:i:s')
        ];
        
        $this->categories->addCategory($dataInsert);
        
        return redirect()->route('categories.list')->with('msg','Create category successfully');
    }
    public function editCategory($id=0)
    {   
        if(!empty($id)){
            $categoryDetail = $this->categories->getOneCategory($id);
            if(!empty($categoryDetail[0])){
                
                $categoryDetail = $categoryDetail[0];
                
            }else{
                return redirect()->route('categories.list')->with('msg','Danh mục không tồn tại');
            }
        }else{
            return redirect()->route('categories.list')->with('msg','Liên kết không tồn tại');
        }
        return view('clients.homeEditCategory',compact('categoryDetail') );
    }
    public function handleEditCategory(Request $request, $id=0){
        $request->validate([
            'name'=>'required|min:3',

        ], [
            'name.required'=>'Name is not allowed to empty',
        ]);
        
        $dataUpdate = [
            $request->name,
            date('Y-m-d H:i:s')
        ];
        
        $this->categories->updateCategory($dataUpdate,$id);

        return  redirect()->route('categories.edit',['id'=>$id])->with('msg','Update successfully');
    }
    public function handleDeleteCategory($id=0){
        
        if(!empty($id)){
            $categoryDetail = $this->categories->getOneCategory($id);
            $existProductHasCate = $this->products->getAllProductsByCate($id)->count();
            
            if(!empty($categoryDetail[0]) && $existProductHasCate === 0){
                $categoryDeleted = $this->categories->deleteCategory($id);
                if($categoryDeleted){
                    $msg='Delete successfully';
                }else{
                    $msg='Delete failed';
                }
            }else{
                $msg = 'This category is not exist or cannot delete this category';
            }
        }else{
            $msg = 'This link is not exist';
        }

        return  redirect()->route('categories.list')->with('msg',$msg);
    }
}
