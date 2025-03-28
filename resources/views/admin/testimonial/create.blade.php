@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم نظرات مشتریان</h2>

        {!! Form::open(['route'=>'testimonial.store', 'method'=>'post', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',null ,['placeholder'=>'در مورد عکس بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('name', 'نام مشتری') !!}
            {!! Form::text('name',null ,['placeholder'=>'نام مشتری خود را بنویسید']) !!}
            @error('name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('job', 'شغل') !!}
            {!! Form::text('job',null ,['placeholder'=>'شغل']) !!}
            @error('job')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'نظر مشتری') !!}
            {!! Form::textarea('description',null ,['placeholder'=>'نظر مشتری']) !!}
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
