@extends('layouts.app')
@section('content')
<!-- Blog Posts -->
@foreach($posts as $post)
<div class="card mb-4">
    <!--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
    {!! Html::image("/img/posts/".$post->image, $post->title, array('class'=>'card-img-top','style'=>'width: 675px; height:225px;'))  !!}
    <div class="card-body">
        <h2 class="card-title">{!! $post->title !!}</h2>
        <p class="card-text">{!! $post->short_desc !!}</p>
        <a href="/store/view/{!! $post->id !!}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        {!! $post->created_at !!} by
        <a href="#">{!! $post->author !!}</a>
    </div>
</div>
@endforeach

<!-- Pagination -->
<ul class=" pagination justify-content-center mb-4 page-item">
    {!! $posts->links() !!}
<!--    <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
    </li>
    <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
    </li>-->
</ul>

@endsection
@section('side_content')

<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        {!! Form::open(array('url'=>'store/search','method'=>'get')) !!}
        <div class="input-group">
            {!! Form::text('keyword',null, array('placeholder'=>'Search for...', 'class'=>'form-control')) !!}

            <span class="input-group-btn">
                {!! Form::submit('Go!',array('class'=>'btn btn-secondary')) !!}
            </span>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $cat)
                    <li>
                        <a href="/store/category/{!! $cat->id !!}">{!! $cat->name !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header">Side Widget</h5>
    <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
    </div>
</div>
@endsection
