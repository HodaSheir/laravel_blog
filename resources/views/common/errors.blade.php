@if(count($errors) > 0)
<!-- Form error list-->
<div class="alert alert-danger">
    <strong> Something is wrong</strong>
    <button type="button" class="close" data-dismiss='alert' aria-label='close'>
            <span aria-hidden="true">&times</span>
        </button>
    <br><br>
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {!! $error !!}
        </li>
        @endforeach
    </ul>
</div>
@endif