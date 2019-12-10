<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
    }
    
    public function create()
    {
        $name = $_POST['name'];
        $id_password = $_POST['id_password'];
        $category = Category::where('name', $name)->get();

        $category = new Category();
            $category->name = $name;
            $category->id_password = $id_password;  
            $category->save();

            return $this->success (200, 'Category added');
    }

    public function show(Category $category)
    {
        $category = Category::all();
        return $this->createResponse(200,'Category', array('category' => $category));
    }

    public function update($id)
    {
        $category = Category::find($id);
        
        if (!empty($_POST['newName']) ) 
            {
                $category->name = $newName;
            }

            $category->save();

    }
   
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return $this->success (200, 'Category deleted');
    }
}
