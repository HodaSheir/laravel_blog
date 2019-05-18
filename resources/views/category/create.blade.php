@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">create new category</h1>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href=""> view all categories</a></li>
            <li><a href="category/create">new category</a></li>
        </ul>
    </nav>
    @if(Session::has('category_create'))
    <div class='alert alert-success'>
        <em>
            {!! session('category_create') !!}
        </em>
        <button type="button" class="close" data-dismiss='alert' aria-label='close'>
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    @endif
    <div class="panel-body">
        @include('common.errors')
        {!! Form ::open(array('url' => 'category'))  !!}
        {!! Form ::label('name', 'Cat Name')  !!}
        {!! Form ::text('name' , null , array('class' => 'form-control'))  !!}
        {!! Form ::submit('create category' , array('class' => 'secondary-cart-btn')) !!}
        {!! Form ::close()!!}
    </div>
@endsection


