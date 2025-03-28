@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>افزودن دسته بندی</h2>

        {!! Form::open(['route'=>'category.store', 'method'=>'post']) !!}

        <div class="form-group">
            {!! Form::label('name', 'نام دسته') !!}
            {!! Form::text('name',null ,['placeholder'=>'عنوان دسته خود را وارد کنید']) !!}
            @error('name')
            <p class="text-danger my-2">{{$message}}</p>
            @enderror
        </div>


        <div class="form-group">
            {!! Form::submit('ثبت اطلاعات',['class'=>'panel-btn']) !!}
        </div>
        {!! Form::close() !!}



    </div>

@endsection
