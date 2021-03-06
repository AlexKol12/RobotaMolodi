@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {!! Form::label('name', 'Title:', ['class' => 'focus']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','id'=>'editor2']) !!}
    <br>
    {!! Form::label('image', 'Add image:') !!}
    {!! Form::file('image',['class' => 'btn'])!!}
</div>
<div class="form-group">
    {!! Form::label('published', 'Опублікувати:') !!}
    {!! Form::hidden('published', 0) !!}
    {!! Form::checkbox('published') !!}
    <br>
</div>
{!! Form::submit('Create news', ['class' => 'btn btn-primary']) !!}

<script>$(document).ready(function(){CKEDITOR.replace( 'description' );});</script>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>