@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">create new post</h1>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="/post/"> view all posts</a></li>
        </ul>
    </nav>
    @if(Session::has('post_create'))
    <div class='alert alert-success'>
        <em>
            {!! session('post_create') !!}
        </em>
        <button type="button" class="close" data-dismiss='alert' aria-label='close'>
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    @endif
    <div class="panel-body">
        @include('common.errors')
        {!! Form ::open(array('url' => 'post','files'=>true))  !!}
        
        {!! Form ::label('cat_id', 'Category')  !!}
        {!! Form ::select('cat_id' , $categories , array('class' => 'form-control'))  !!}
        
        {!! Form ::label('title', 'Title')  !!}
        {!! Form ::text('title' , null , array('class' => 'form-control'))  !!}
        
        {!! Form ::label('author', 'Author')  !!}
        {!! Form ::text('author' , null , array('class' => 'form-control'))  !!}
        
        {!! Form ::label('image', 'Image')  !!}
        {!! Form ::file('image' , null , array('class' => 'form-control'))  !!}
        
        {!! Form ::label('short_desc', 'Short Desc')  !!}
        {!! Form ::text('short_desc' , null , array('class' => 'form-control'))  !!}
        
        {!! Form ::label('description', 'Description')  !!}
        {!! Form ::textarea('description' , null , array('class' => 'form-control'))  !!}
        
        {!! Form ::submit('create post' , array('class' => 'secondary-cart-btn')) !!}
        {!! Form ::close()!!}
    </div>
@endsection
