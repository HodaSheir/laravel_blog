@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800"> Edit category</h1>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href="/category"> view all categories</a></li>
            <li><a href="/category/create">new category</a></li>
        </ul>
    </nav>


    <div class="panel-body">
        @include('common.errors')
        {!! Form ::model($categories , array('route' => array('category.update' , $categories->id), 'method'=>'PUT'))  !!}
        {!! Form ::label('name', 'Cat Name')  !!}
        {!! Form ::text('name' , null , array('class' => 'form-control'))  !!}
        {!! Form ::submit('update category' , array('class' => 'secondary-cart-btn')) !!}
        {!! Form ::close()!!}
    </div>
@endsection


