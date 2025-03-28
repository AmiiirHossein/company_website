@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ویرایش بخش منو بالایی</h2>

        {!! Form::model($topHeader,['route'=>['topHeader.update',$topHeader->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('email', ' ایمیل شما') !!}
            {!! Form::text('email',old('email') ,['placeholder'=>'این ایمیل سایت است']) !!}
            @error('email')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('phone', ' شماره تماس شما') !!}
            {!! Form::text('phone',old('phone') ,['placeholder'=>'این شماره تماس شما است']) !!}
            @error('phone')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('instagram', ' اینستاگرام شما') !!}
            {!! Form::text('instagram',old('instagram') ,['placeholder'=>'این اینستاگرام است']) !!}
            @error('instagram')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('facebook', ' فیسبوک شما') !!}
            {!! Form::text('facebook',old('facebook') ,['placeholder'=>'این فیسبوک است']) !!}
            @error('facebook')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('twitter', ' توییتر شما') !!}
            {!! Form::text('twitter',old('twitter') ,['placeholder'=>'این توییتر است']) !!}
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
