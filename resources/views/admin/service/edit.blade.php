@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ساخت قسمت جدید مقدمه</h2>

        {!! Form::model($service,['route'=>['service.update', $service->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',null ,['placeholder'=>'درباره عکس']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_one', 'عنوان خدمت اول') !!}
            {!! Form::text('service_title_one',null ,['placeholder'=>'خدمت اول']) !!}
            @error('service_title_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_one', 'درباره خدمت اول') !!}
            {!! Form::text('service_desc_one',null ,['placeholder'=>'درباره خدمت اول']) !!}
            @error('service_desc_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('link_one', 'لینک اول') !!}
            {!! Form::text('link_one',null ,['placeholder'=>'لینک اول']) !!}
            @error('link_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_two', 'عنوان خدمت دوم') !!}
            {!! Form::text('service_title_two',null ,['placeholder'=>'خدمت دوم']) !!}
            @error('service_title_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_two', 'درباره خدمت دوم') !!}
            {!! Form::text('service_desc_two',null ,['placeholder'=>'درباره خدمت دوم']) !!}
            @error('service_desc_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('link_two', 'لینک دوم') !!}
            {!! Form::text('link_two',null ,['placeholder'=>'لینک دوم']) !!}
            @error('link_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_title_three', 'عنوان خدمت سوم') !!}
            {!! Form::text('service_title_three',null ,['placeholder'=>'خدمت سوم']) !!}
            @error('service_title_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('service_desc_three', 'درباره خدمت سوم') !!}
            {!! Form::text('service_desc_three',null ,['placeholder'=>'درباره خدمت سوم']) !!}
            @error('service_desc_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('link_three', 'لینک سوم') !!}
            {!! Form::text('link_three',null ,['placeholder'=>'لینک سوم']) !!}
            @error('link_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>


        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
