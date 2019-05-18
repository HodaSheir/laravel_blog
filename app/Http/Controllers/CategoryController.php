<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index')->with('categories',$categories);
    }
    
    public function create(){
        return view('category.create');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request -> all(),[
            'name' => 'required|max:20|min:3'
        ]);
        
        if($validator->fails()){ //echo '1'; die();
            return redirect('category/create')->withInput()->withErrors($validator);
        }
        
        // create category
        $category = new Category();
        $category->name = $request['name'];
//        $category->name = $request->name;
        $category->save();
        
        Session::flash('category_create','New category is created');
        
        return  redirect('category/create');
        
    }
    
    public function edit(){
        
    }
}
