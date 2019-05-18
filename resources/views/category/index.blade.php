@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Category control</h1>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav">
            <li><a href=""> view all categories</a></li>
            <li><a href="category/create">new category</a></li>
        </ul>
    </nav>
    @if (count($categories) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            All Categories
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>Category</th>
                    <th>&n&nbsp;</th>
                </thead>
                <tbody>
                    @foreach($categories as $cat)
                    <tr>
                        <td>
                            <div>{!! $cat->name  !!}</div>
                        </td>
                        <td><a href="{!! url('category/'.$cat->id.'/edit' ) !!}">Edit</a><td>
                        <td><a href="">Delete</a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
@endsection


