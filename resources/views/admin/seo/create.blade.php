@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ساخت بخش سئو</h2>

        {!! Form::open(['route'=>'seo.store', 'method'=>'post']) !!}

            <div class="form-group">
                {!! Form::label('title', 'عنوان سایت') !!}
                {!! Form::text('title',null ,['placeholder'=>'این عنوان سایت است']) !!}
                @error('title')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
            </div>
        <div class="form-group">
            {!! Form::label('keywords', 'کلمات کلیدی') !!}
            {!! Form::textarea('keywords',null ,['placeholder'=>'کلمات کلیدی وب سایت میتوایند با , از هم جدا کنید']) !!}
            @error('keywords')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره وب سایت شما') !!}
            {!! Form::textarea('description',null ,['placeholder'=>'درباره وب سایت بنویسید.']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('site_name', ' نام سایت') !!}
            {!! Form::text('site_name',null ,['placeholder'=>'نام سایت خود را وارد کنید']) !!}
            @error('site_name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('site_url', 'آدرس وب سایت') !!}
            {!! Form::text('site_url',null ,['placeholder'=>'آدرس وب سایت']) !!}
            @error('site_url')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter_name', 'اسم توییتر') !!}
            {!! Form::text('twitter_name',null ,['placeholder'=>'اسم توییتر شما']) !!}
            @error('twitter_name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter_description', 'درباره شما در توییتر') !!}
            {!! Form::textarea('twitter_description',null ,['placeholder'=>'درباره توییتر شما.']) !!}
            @error('twitter_description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}


    </div>

@endsection
