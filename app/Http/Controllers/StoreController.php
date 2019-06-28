<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Post;
use App\Store;
use Session;
use File;
use DB;

class StoreController extends Controller {

    //
    public function index() {
        $posts = Post::with('Category')->orderby('created_at', 'DESC')->paginate(1);
        $categories = Category::all();
//        echo '<pre>'; print_r($posts); die();
        return view('store.main')->with('posts', $posts)->with('categories', $categories);
    }

    public function getView($id) {

        return view('store.view')->with('posts', Post::find($id));
    }

    public function getCategory($id) {
        $posts = DB::table('posts')->where('cat_id', '=', $id)->paginate(1);
        $cat_data = Category::find($id);
        $categories = Category::all();
        return view('store.category')
                        ->with('posts', $posts)
                        ->with('categories', $categories)
                        ->with('cat_data', $cat_data);
    }

    public function getSearch(Request $request) {
        $keyword = $request->input('keyword');
        $categories = Category::all();
        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')->paginate(1);
//                echo 'hi';echo '<pre>'; print_r($posts); die();
        if ($keyword != '') {
            return view('store.search')
                            ->with('posts', $posts)
                            ->with('keyword', $keyword)
                            ->with('categories', $categories);
//                            ->with('cat_data', $cat_data);
        }else{
            return redirect('/');
        }
    }

}
