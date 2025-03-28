@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ارسال بلاگ</h2>

        {!! Form::open(['route'=>'blog.store', 'method'=>'post', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('category', 'دسته بندی') !!}
            <select name="category_id">
                @foreach ($category as $item )
                    <option value={{ $item->id }}>{{ $item->name }}</option>
                @endforeach
            </select>

            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',null ,['placeholder'=>'درباره عکس بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('subject', 'موضوع بلاگ') !!}
            {!! Form::text('subject',null ,['placeholder'=>'موضوع بلاگ خود را بنویسید']) !!}
            @error('subject')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('body', 'درباره بلاگ') !!}
            {!! Form::textarea('body',null ,['placeholder'=>'درباره بلاگ']) !!}
            @error('body')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <h3 class="py-3 text-white">بخش سئو بلاگ</h3>
        <div class="form-group">
            {!! Form::label('title', 'عنوان صفحه') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان صفحه']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره صفحه') !!}
            {!! Form::textarea('description',null ,['placeholder'=>'درباره صفحه']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('keywords', 'کلمات کلیدی') !!}
            {!! Form::textarea('keywords',null ,['placeholder'=>'کلمات کلیدی']) !!}
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
