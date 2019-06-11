@extends('admin.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">Category control</h1>
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="/category/"> view all categories</a></li>
        <li><a href="/category/create/">new category</a></li>
    </ul>
</nav>
@if(Session::has('category_update') || Session::has('category_deleted'))
<div class='alert alert-success'>
    @if(Session::has('category_update'))
    <em>
        {!! session('category_update') !!}
    </em>
    @endif
    @if(Session::has('category_deleted'))
    <em>
        {!! session('category_deleted') !!}
    </em>
    @endif
    <button type="button" class="close" data-dismiss='alert' aria-label='close'>
        <span aria-hidden="true">&times</span>
    </button>
</div>
@endif
@if (count($categories) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        All Categories
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
            <th>Category</th>
            <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                <tr>
                    <td>
                        <div>{!! $cat->name  !!}</div>
                    </td>
                    <td><a href="{!! url('category/'.$cat->id.'/edit' ) !!}">Edit</a><td>
                    <td>
                        {!! Form::open(array('url'=>'category/'.$cat->id,'method'=>'DELETE')) !!}
                        {!! csrf_field()!!}
                        {!! method_field('DELETE')!!}
                        <button class="btn btn-danger">Delete</button>
                        {!! Form::close()!!}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection


