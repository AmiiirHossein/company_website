@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم فوتر - درباره ما</h2>

        {!! Form::model($footerContact,['route'=>['footerContact.update',$footerContact->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('address', 'آدرس') !!}
            {!! Form::text('address',null ,['placeholder'=>'آدرس']) !!}
            @error('address')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('phone', 'تلفن') !!}
            {!! Form::text('phone',null ,['placeholder'=>'تلفن']) !!}
            @error('phone')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('email', 'ایمیل') !!}
            {!! Form::text('email',null ,['placeholder'=>'ایمیل']) !!}
            @error('email')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
