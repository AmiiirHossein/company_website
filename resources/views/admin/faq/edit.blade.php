@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم بخش سوالات متداول</h2>

        {!! Form::model($faq,['route'=>['faq.update', $faq->id], 'method'=>'put', 'files'=>true]) !!}

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
            {!! Form::label('faq_one', 'سوال اول') !!}
            {!! Form::text('faq_one',old('faq_one') ,['placeholder'=>'سوال اول']) !!}
            @error('faq_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('faq_desc_one', 'جواب سوال اول') !!}
            {!! Form::textarea('faq_desc_one',old('faq_desc_one') ,['placeholder'=>'جواب سوال اول']) !!}
            @error('faq_desc_one')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('faq_two', 'سوال دوم') !!}
            {!! Form::text('faq_two',old('faq_two') ,['placeholder'=>'سوال اول']) !!}
            @error('faq_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('faq_desc_two', 'جواب سوال دوم') !!}
            {!! Form::textarea('faq_desc_two',old('faq_desc_two') ,['placeholder'=>'جواب سوال دوم']) !!}
            @error('faq_desc_two')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('faq_three', 'سوال سوم') !!}
            {!! Form::text('faq_three',old('faq_three') ,['placeholder'=>'سوال سوم']) !!}
            @error('faq_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('faq_desc_three', 'جواب سوال سوم') !!}
            {!! Form::textarea('faq_desc_three',old('faq_desc_three') ,['placeholder'=>'جواب سوال سوم']) !!}
            @error('faq_desc_three')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
