@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم فوتر - درباره ما</h2>

        {!! Form::open(['route'=>'footerAbout.store', 'method'=>'post']) !!}

        <div class="form-group">
            {!! Form::label('title', 'عنوان') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'پیام') !!}
            {!! Form::textarea('description',null ,['placeholder'=>'پیام']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('instagram', 'لینک اینستاگرام') !!}
            {!! Form::text('instagram',null ,['placeholder'=>'لینک اینستاگرام']) !!}
            @error('instagram')
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
