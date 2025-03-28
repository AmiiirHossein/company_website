@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات منوی بالای سایت</h2>

        {!! Form::open(['route'=>'home.store', 'method'=>'post', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('established', 'سال تاسیس') !!}
            {!! Form::text('established',null ,['placeholder'=>'سال مورد نظر خود را وارد کنید']) !!}
            @error('established')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره شرکت') !!}
            {!! Form::text('description',null ,['placeholder'=>'توضیحات خود را وارد کنید']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('about', 'لینک درباره ما') !!}
            {!! Form::text('about',null ,['placeholder'=>'توضیحات خود را وارد کنید']) !!}
            @error('about')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('question', 'لینک سوالات متداول') !!}
            {!! Form::text('question',null ,['placeholder'=>'توضیحات خود را وارد کنید']) !!}
            @error('question')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
