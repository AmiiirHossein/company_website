@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات منوی بالای سایت</h2>

        {!! Form::open(['route'=>'about.store', 'method'=>'post', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',null ,['placeholder'=>'درباره عکس خود بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('experience_title', 'سابقه کار') !!}
            {!! Form::text('experience_title',null ,['placeholder'=>'سال سابقه کار خود را وارد کنید']) !!}
            @error('experience_title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('experience_desc', 'درباره') !!}
            {!! Form::text('experience_desc',null ,['placeholder'=>'درباره سابقه کار خود']) !!}
            @error('experience_desc')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('title', 'عنوان درباره ما') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان خود را وارد کنید']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('subtitle', 'درباره عنوان') !!}
            {!! Form::text('subtitle',null ,['placeholder'=>'درباره عنوان خود را وارد کنید']) !!}
            @error('subtitle')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره شرکت') !!}
            {!! Form::textarea('description',null ,['placeholder'=>'درباره شرکت خود را وارد کنید']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('helper', 'عنوان خدمات ') !!}
            {!! Form::text('helper',null ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('helper')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <h3 class="py-5 text-white">تنظیم خدمات</h3>
        <div class="form-group">
            {!! Form::label('service_title_one', 'خدمت اول ') !!}
            {!! Form::text('service_title_one',null ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_one', 'درباره خدمت اول ') !!}
            {!! Form::text('service_desc_one',null ,['placeholder'=>'درباره خدمت اول']) !!}
            @error('service_desc_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_two', 'خدمت دوم ') !!}
            {!! Form::text('service_title_two',null ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_two', 'درباره خدمت دوم ') !!}
            {!! Form::text('service_desc_two',null ,['placeholder'=>'درباره خدمت دوم']) !!}
            @error('service_desc_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_three', 'خدمت سوم ') !!}
            {!! Form::text('service_title_three',null ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_three', 'درباره خدمت سوم ') !!}
            {!! Form::text('service_desc_three',null ,['placeholder'=>'درباره خدمت سوم']) !!}
            @error('service_desc_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('service_title_four', ' خدمت چهارم ') !!}
            {!! Form::text('service_title_four',null ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_four')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_four', 'درباره خدمت چهارم ') !!}
            {!! Form::text('service_desc_four',null ,['placeholder'=>'درباره خدمت چهارم']) !!}
            @error('service_desc_four')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>


        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
