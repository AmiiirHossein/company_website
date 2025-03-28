@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2> ویرایش کاربر</h2>

        <form action="{{route('users.update',$users->id)}}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for=username">نام و نام خانوادگی</label>
                <input type="text" name="name" id="username" value="{{$users->name}}" placeholder="نام و نام خانوادگی">
                @error('name')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for=email">ایمیل</label>
                <input type="text" name="email" id="email" value="{{$users->email}}" placeholder="ایمیل">
                @error('email')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for=mobile">موبایل</label>
                <input type="text" name="mobile" id="mobile" value="{{$users->mobile}}" placeholder="موبایل">
                @error('mobile')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>سطح دسترسی</label>
                <select name="role">
                    <option value="user" @if($users->role === 'user') selected @endif>کاربر عادی</option>
                    <option value="author" @if($users->role === 'author') selected @endif>نویسنده</option>
                    <option value="admin" @if($users->role === 'admin') selected @endif>مدیر کل</option>
                </select>
                @error('role')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="ذخیره" class="btn-admin">
            </div>
        </form>

    </div>

@endsection
