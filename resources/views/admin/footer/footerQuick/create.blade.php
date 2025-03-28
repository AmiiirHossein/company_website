@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم فوتر - درباره ما</h2>

        {!! Form::open(['route'=>'footerQuick.store', 'method'=>'post']) !!}

        <div class="form-group">
            {!! Form::label('title', 'عنوان') !!}
            {!! Form::text('title',null ,['placeholder'=>'عنوان']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('link', 'لینک') !!}
            {!! Form::text('link',null ,['placeholder'=>'لینک']) !!}
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
