@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ویرایش بخش شمارنده</h2>

        {!! Form::model($counter,['route'=>['counter.update', $counter->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/counter/'.$counter->image)}}" width="150" alt=""></p>
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('title', 'عنوان ') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره ') !!}
            {!! Form::text('description',null ,['placeholder'=>'درباره']) !!}
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
