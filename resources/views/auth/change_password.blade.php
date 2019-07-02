@extends('admin.main')
@section('content')
<div class="container">
    <h3>Change password</h3>
    {!! Form::model($users , array('route' => array('user.update' , $users->id) , 'method'=>'PUT')) !!}
    {!!  csrf_field () !!}

    @if (Session::get('error'))
    <div class="alert alert-error">
        {{ Session::get('error') }}
    </div>
    @endif
    @include('common.errors')
    <div class='form-group'>
        {!! Form::password('password', array('placeholder'=> 'New Password')) !!}
    </div>
    <div class="form-group">
        {!! Form::password('password_confirmation', array('placeholder'=> 'New Password Confirmation')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Password', array('class'=> 'btn btn-primary')) !!}
    </div>
    {!! Form ::close()!!}
</div>
@endsection

