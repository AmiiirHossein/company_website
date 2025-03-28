@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ویرایش بخش درباره ما</h2>

        {!! Form::model($about,['route'=>['about.update', $about->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/about/'.$about->image)}}" width="150" alt=""></p>
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',old('alt') ,['placeholder'=>'درباره عکس خود بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('experience_title', 'سابقه کار') !!}
            {!! Form::text('experience_title',old('experience_title') ,['placeholder'=>'سال سابقه کار خود را وارد کنید']) !!}
            @error('experience_title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('experience_desc', 'درباره') !!}
            {!! Form::text('experience_desc',old('experience_desc') ,['placeholder'=>'درباره سابقه کار خود']) !!}
            @error('experience_desc')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('title', 'عنوان درباره ما') !!}
            {!! Form::text('title',old('title') ,['placeholder'=>'عنوان خود را وارد کنید']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('subtitle', 'درباره عنوان') !!}
            {!! Form::text('subtitle',old('subtitle') ,['placeholder'=>'درباره عنوان خود را وارد کنید']) !!}
            @error('subtitle')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره شرکت') !!}
            {!! Form::textarea('description',old('description') ,['placeholder'=>'درباره شرکت خود را وارد کنید']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('helper', 'عنوان خدمات ') !!}
            {!! Form::text('helper',old('helper') ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('helper')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <h3 class="py-5 text-white">تنظیم خدمات</h3>
        <div class="form-group">
            {!! Form::label('service_title_one', 'خدمت اول ') !!}
            {!! Form::text('service_title_one',old('service_title_one') ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_one', 'درباره خدمت اول ') !!}
            {!! Form::text('service_desc_one',old('service_desc_one') ,['placeholder'=>'درباره خدمت اول']) !!}
            @error('service_desc_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_two', 'خدمت دوم ') !!}
            {!! Form::text('service_title_two',old('service_title_two') ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_two', 'درباره خدمت دوم ') !!}
            {!! Form::text('service_desc_two',old('service_desc_two') ,['placeholder'=>'درباره خدمت دوم']) !!}
            @error('service_desc_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_three', 'خدمت سوم ') !!}
            {!! Form::text('service_title_three',old('service_title_three') ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_three', 'درباره خدمت سوم ') !!}
            {!! Form::text('service_desc_three',old('service_desc_three') ,['placeholder'=>'درباره خدمت سوم']) !!}
            @error('service_desc_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('service_title_four', ' خدمت چهارم ') !!}
            {!! Form::text('service_title_four',old('service_title_four') ,['placeholder'=>' عنوان خود را وارد کنید']) !!}
            @error('service_title_four')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_four', 'درباره خدمت چهارم ') !!}
            {!! Form::text('service_desc_four',old('service_desc_four') ,['placeholder'=>'درباره خدمت چهارم']) !!}
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
