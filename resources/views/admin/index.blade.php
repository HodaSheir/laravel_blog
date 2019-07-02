@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
    @if(Session::has('password_updated'))
    <div class='alert alert-success'>
        <em>
            {!! session('password_updated') !!}
        </em>
        <button type="button" class="close" data-dismiss='alert' aria-label='close'>
            <span aria-hidden="true">&times</span>
        </button>
    </div>
    @endif
@endsection

