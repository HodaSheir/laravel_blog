<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;
use App\Post;
use Session;
use File;

class PostController extends Controller {

    public function _construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function index() {
        $posts = Post::with('Category')->get();
        return view('post.main')->with('posts', $posts);
    }

    public function create() {
        $categories = Category::all();
        foreach ($categories as $category) {
            $cat_array[$category->id] = $category->name;
        }
        return view('post.create')->with('categories', $cat_array);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
                    'cat_id' => 'required|integer',
                    'title' => 'required|max:20|min:3',
                    'author' => 'required|max:20|min:3',
                    'image' => 'required|mimes:jpg,jpeg,png,jif',
                    'short_desc' => 'required|max:50|min:10',
                    'description' => 'required|max:1000|min:50',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')->withInput()->withErrors($validator);
        }

        $image = $request->file('image');
        $upload = 'img/posts/';
        $filename = time() . $image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload . $filename);

        $post = new Post();
        $post->cat_id = $request['cat_id'];
        $post->title = $request['title'];
        $post->author = $request['author'];
        $post->image = $filename;
        $post->short_desc = $request['short_desc'];
        $post->description = $request['description'];

        $post->save();

        Session::flash('post_create', 'New post is created');

        return redirect('post/create');
    }

    public function edit($id) {
        $post = Post::findorfail($id);
        $categories = Category::all();
        foreach ($categories as $category) {
            $cat_array[$category->id] = $category->name;
        }
        return view('post.edit')->with('post', $post)->with('categories', $cat_array);
    }

    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(), [
                    'cat_id' => 'required|integer',
                    'title' => 'required|max:20|min:3',
                    'author' => 'required|max:20|min:3',
                    'image' => 'mimes:jpg,jpeg,png,jif',
                    'short_desc' => 'required|max:50|min:10',
                    'description' => 'required|max:1000|min:50',
        ]);

        $post = Post::find($id);

        if ($validator->fails()) {
            return redirect('post/' . $post->id . 'edit')->withInput()->withErrors($validator);
        }

        if ($request->file('image') != '') {
            $image = $request->file('image');
            $upload = 'img/posts/';
            $filename = time() . $image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload . $filename);
        }



        $post->cat_id = $request['cat_id'];
        $post->title = $request->Input('title'); //$request['title'];
        $post->author = $request->Input('author');
        if (isset($filename)) {
            $post->image = $filename;
        }

        $post->short_desc = $request->Input('short_desc');
        $post->description = $request->Input('description');

        $post->save();

        Session::flash('post_update', 'Post is updated');

        return redirect('post');
    }
    
    public function destroy($id) {
        $post = Post::find($id);
        $image_path = 'img/posts/'.$post->image;
    	File::delete($image_path);
        $post->delete();
        Session::flash('post_deleted', 'Post is deleted');
        return redirect('post');
    }

}
