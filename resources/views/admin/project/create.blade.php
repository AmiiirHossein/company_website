@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات منوی بالای سایت</h2>

        {!! Form::open(['route'=>'project.store', 'method'=>'post', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',null ,['placeholder'=>'درباره عکس']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('title', 'عنوان پروژه') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان پروژه خود را وارد کنید']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره پروژه') !!}
            {!! Form::text('description',null ,['placeholder'=>'در مورد پروژه بنویسید']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
