@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات منوی بالای سایت</h2>

        {!! Form::model($team,['route'=>['team.update',$team->id], 'method'=>'put', 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('image', 'عکس صفحه اصلی') !!}
            {!! Form::file('image',null ,['placeholder'=>'عکس خود را وارد کنید']) !!}
            <p><img src="{{asset('back/images/team/'.$team->image)}}" width="100" alt=""></p>
            @error('image')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('alt', 'درباره عکس') !!}
            {!! Form::text('alt',null ,['placeholder'=>'راجب عکس بنویسید']) !!}
            @error('alt')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('name', 'نام') !!}
            {!! Form::text('name',null ,['placeholder'=>'نام شخص مورد نظر']) !!}
            @error('name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('job', 'رتبه سازمانی') !!}
            {!! Form::text('job',null ,['placeholder'=>'رتبه سازمانی']) !!}
            @error('job')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('instagram', 'لینک اینستا') !!}
            {!! Form::text('instagram',null ,['placeholder'=>'لینک اینستاگرام']) !!}
            @error('instagram')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('linkedin', 'لینک لینکداین') !!}
            {!! Form::text('linkedin',null ,['placeholder'=>'لینک لینکداین']) !!}
            @error('linkedin')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('facebook', 'لینک فیسبوک') !!}
            {!! Form::text('facebook',null ,['placeholder'=>'لینک فیسبوک']) !!}
            @error('facebook')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter', 'لینک توییتر') !!}
            {!! Form::text('twitter',null ,['placeholder'=>'لینک توییتر']) !!}
            @error('twitter')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
