@extends('admin.main')
@section('content')
<h1 class="h3 mb-4 text-gray-800">All post </h1>
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="/post/"> view all posts</a></li>
        <li><a href="/post/create/">new post</a></li>
    </ul>
</nav>
@if(Session::has('post_update') || Session::has('post_deleted'))
<div class='alert alert-success'>
    @if(Session::has('post_update'))
    <em>
        {!! session('post_update') !!}
    </em>
    @endif
    @if(Session::has('post_deleted'))
    <em>
        {!! session('post_deleted') !!}
    </em>
    @endif
    <button type="button" class="close" data-dismiss='alert' aria-label='close'>
        <span aria-hidden="true">&times</span>
    </button>
</div>
@endif
@if (count($posts) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        All Posts
    </div>
    <div class="panel-body">
        <table class="table table-striped task-table">
            <thead>
            <th>Title</th>
            <th> Category</th>
            <th>Author</th>
            <th>short desc</th>
            <th>full desc</th>
            <th>image</th>
            <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <div>{!! $post->title  !!}</div>
                    </td>
                    <td>
                        <div>{!! $post->Category->name  !!}</div>
                    </td>
                    <td>
                        <div>{!! $post->author  !!}</div>
                    </td>
                    <td>
                        <div>{!! $post->short_desc  !!}</div>
                    </td>
                    <td>
                        <div>{!! $post->description  !!}</div>
                    </td>
                    <td>
                        <div>{!! Html::image("/img/posts/".$post->image, $post->title, array('width'=>'60'))  !!}</div>
                    </td>
                    <td><a href="{!! url('post/'.$post->id.'/edit' ) !!}">Edit</a><td>
                    <td>
                        {!! Form::open(array('url'=>'post/'.$post->id,'method'=>'DELETE')) !!}
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


