@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>ویرایش دسته بندی</h2>

        {!! Form::model($category,['route'=>['category.update', $category->id], 'method'=>'put']) !!}

        <div class="form-group">
            {!! Form::label('name', 'نام دسته') !!}
            {!! Form::text('name',old('name') ,['placeholder'=>'عنوان دسته خود را وارد کنید']) !!}
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
