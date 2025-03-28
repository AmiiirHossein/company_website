@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ویرایش بلاگ</h2>

        {!! Form::model($blog,['route'=>['blog.update', $blog->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/blog/'.$blog->image)}}" width="100" alt=""></p>
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',old('alt') ,['placeholder'=>'درباره عکس بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'موضوع بلاگ') !!}
            {!! Form::text('subject',old('subject') ,['placeholder'=>'موضوع بلاگ خود را بنویسید']) !!}
            @error('subject')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('body', 'درباره بلاگ') !!}
            {!! Form::textarea('body',old('body') ,['placeholder'=>'درباره بلاگ']) !!}
            @error('body')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <h3 class="py-3 text-white">بخش سئو بلاگ</h3>
        <div class="form-group">
            {!! Form::label('title', 'عنوان صفحه') !!}
            {!! Form::text('title',old('title') ,['placeholder'=>'عنوان صفحه']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره صفحه') !!}
            {!! Form::textarea('description',old('description') ,['placeholder'=>'درباره صفحه']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('keywords', 'کلمات کلیدی') !!}
            {!! Form::textarea('keywords',old('keywords') ,['placeholder'=>'کلمات کلیدی']) !!}
            @error('keywords')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
