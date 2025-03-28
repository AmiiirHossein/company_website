@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم فوتر -  خدمات ما</h2>

        {!! Form::open(['route'=>'footerService.store', 'method'=>'post', 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('image', 'عکس') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس']) !!}
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
            {!! Form::label('title', 'عنوان خدمت') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان خدمت']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('link', 'لینک مطلب') !!}
            {!! Form::text('link',null ,['placeholder'=>'لینک مطلب']) !!}
            @error('link')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('author', 'نویسنده') !!}
            {!! Form::text('author',null ,['placeholder'=>'نویسنده']) !!}
            @error('author')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
