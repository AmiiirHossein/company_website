@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ساخت بخش سئو</h2>

        {!! Form::model($seos,['route'=>['seo.update',$seos->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('title', 'عنوان سایت') !!}
            {!! Form::text('title',old('title') ,['placeholder'=>'این عنوان سایت است']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('keywords', 'کلمات کلیدی') !!}
            {!! Form::textarea('keywords',old('keywords') ,['placeholder'=>'کلمات کلیدی وب سایت میتوایند با , از هم جدا کنید']) !!}
            @error('keywords')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره وب سایت شما') !!}
            {!! Form::textarea('description',old('description') ,['placeholder'=>'درباره وب سایت بنویسید.']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('site_name', ' نام سایت') !!}
            {!! Form::text('site_name',old('site_name') ,['placeholder'=>'نام سایت خود را وارد کنید']) !!}
            @error('site_name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('site_url', 'آدرس وب سایت') !!}
            {!! Form::text('site_url',old('site_url') ,['placeholder'=>'آدرس وب سایت']) !!}
            @error('site_url')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter_name', 'اسم توییتر') !!}
            {!! Form::text('twitter_name',old('twitter_name') ,['placeholder'=>'اسم توییتر شما']) !!}
            @error('twitter_name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter_description', 'درباره شما در توییتر') !!}
            {!! Form::textarea('twitter_description',old('twitter_description') ,['placeholder'=>'درباره توییتر شما.']) !!}
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
