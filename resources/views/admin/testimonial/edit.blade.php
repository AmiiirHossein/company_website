@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم نظرات مشتریان</h2>

        {!! Form::model($testimonial,['route'=>['testimonial.update', $testimonial->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/testimonial/'.$testimonial->image)}}" width="100" alt=""></p>
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',old('alt') ,['placeholder'=>'در مورد عکس بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('name', 'نام مشتری') !!}
            {!! Form::text('name',old('name') ,['placeholder'=>'نام مشتری خود را بنویسید']) !!}
            @error('name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('job', 'شغل') !!}
            {!! Form::text('job',old('job') ,['placeholder'=>'شغل']) !!}
            @error('job')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'نظر مشتری') !!}
            {!! Form::textarea('description',old('description') ,['placeholder'=>'نظر مشتری']) !!}
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
