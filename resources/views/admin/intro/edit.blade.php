@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ساخت قسمت جدید مقدمه</h2>

        {!! Form::model($intro,['route'=>['intro.update', $intro->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/intro/'.$intro->image)}}" width="150" alt=""></p>
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('title', 'عنوان این بخش') !!}
            {!! Form::text('title',old('title') ,['placeholder'=>'عنوان خود را وارد کنید']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'درباره این بخش') !!}
            {!! Form::text('description',old('description') ,['placeholder'=>'متن خود را وارد کنید']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('link', 'لینک این بخش') !!}
            {!! Form::text('link',old('link') ,['placeholder'=>'لینک خود را وارد کنید']) !!}
            @error('link')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>




        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
