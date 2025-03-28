@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات منوی بالای سایت</h2>

        {!! Form::open(['route'=>'topHeader.store', 'method'=>'post']) !!}

        <div class="form-group">
            {!! Form::label('email', 'ایمیل شما') !!}
            {!! Form::text('email',null ,['placeholder'=>'ایمیل خود را وارد کنید']) !!}
                @error('email')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'شماره تماس') !!}
            {!! Form::text('phone', null, ['placeholder'=> 'شماره تماس شما']) !!}
            @error('phone')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group">
            {!! Form::label('instagram', 'اینستاگرام شما') !!}
            {!! Form::text('instagram', null, ['placeholder'=> 'لینک اینستاگرام']) !!}
            @error('instagram')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('facebook', 'فیسبوک شما') !!}
            {!! Form::text('facebook', null, ['placeholder'=> 'لینک فیسبوک']) !!}
            @error('facebook')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter', 'توییتر شما') !!}
            {!! Form::text('twitter', null, ['placeholder'=> 'لینک توییتر']) !!}
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
