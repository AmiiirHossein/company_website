@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم فوتر - درباره ما</h2>

        {!! Form::model($footerAbout,['route'=>['footerAbout.update',$footerAbout->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('title', 'عنوان') !!}
            {!! Form::text('title',old('title') ,['placeholder'=>'عنوان']) !!}
            @error('title')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('description', 'پیام') !!}
            {!! Form::textarea('description',old('description') ,['placeholder'=>'پیام']) !!}
            @error('description')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('instagram', 'لینک اینستاگرام') !!}
            {!! Form::text('instagram',old('instagram') ,['placeholder'=>'لینک اینستاگرام']) !!}
            @error('instagram')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('facebook', 'لینک فیسبوک') !!}
            {!! Form::text('facebook',old('facebook') ,['placeholder'=>'لینک فیسبوک']) !!}
            @error('facebook')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter', 'لینک توییتر') !!}
            {!! Form::text('twitter',old('twitter') ,['placeholder'=>'لینک توییتر']) !!}
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
