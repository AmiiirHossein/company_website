@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>شما در حال ویرایش آیتم مورد نظر هستید</h2>

        {!! Form::model($hero,['route'=>['home.update', $hero->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/hero/'.$hero->image)}}" width="150" alt=""></p>

            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('established', 'سال تاسیس') !!}
            {!! Form::text('established',old('established') ,['placeholder'=>'سال مورد نظر خود را وارد کنید']) !!}
            @error('established')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره شرکت') !!}
            {!! Form::text('description',old('description') ,['placeholder'=>'توضیحات خود را وارد کنید']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('about', 'لینک درباره ما') !!}
            {!! Form::text('about',old('about') ,['placeholder'=>'توضیحات خود را وارد کنید']) !!}
            @error('about')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('question', 'لینک سوالات متداول') !!}
            {!! Form::text('question',old('question') ,['placeholder'=>'توضیحات خود را وارد کنید']) !!}
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
