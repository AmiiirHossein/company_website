@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2> ویرایش کاربر</h2>

        <form action="{{route('comment.update',$comment->id)}}" method="post">
            @csrf
            @method('put')

            <div class="form-group">
                <label>تایید نظر</label>
                <select name="status">
                    <option value="0" @if($comment->status === 0) selected @endif>تایید نشده</option>
                    <option value="1" @if($comment->status === 1) selected @endif>تایید شده</option>
                </select>
                @error('status')
                <p class="text-danger my-2">{{$message}}</p>
                @enderror
            </div>

            <div class="form-group">
                <input type="submit" value="ذخیره" class="btn-admin">
            </div>
        </form>

    </div>

@endsection
