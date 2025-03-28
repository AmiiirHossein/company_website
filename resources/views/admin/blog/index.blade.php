@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات بخش بلاگ ها</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس</th>
                <th>دسته بندی</th>
                <th>درباره عکس</th>
                <th> نویسنده بلاگ</th>
                <th>عنوان بلاگ</th>
                <th>محتوای بلاگ</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($blog as $item)
                <tr>
                    <td><img src="{{asset('back/images/blog/'.$item->image)}}"  width="90" alt=""></td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->alt}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->subject}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->body, 20)}}</td>

                    <td><a href="{{route('blog.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="{{route('blog.destroy', $item->id)}}" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('blog.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('blog.create')}}" class="panel-btn mb-4">ارسال بلاگ</a>

                {{  $blog->links()  }}

    </div>

@endsection
@section('js')

    @if(Session::has('create'))
        <script>
            Swal.fire({
                icon: "success",
                title: 'تبریک میگم',
                text: "تنظیمات با موفقیت تکمیل شد.",
                confirmButtonText: "تایید",
            })
        </script>
    @endif
    @if(Session::has('update'))
        <script>
            Swal.fire({
                icon: "success",
                title: 'تبریک میگم',
                text: "ویرایش با موفقیت انجام شد.",
                confirmButtonText: "تایید",
            })
        </script>
    @endif

    <script>
        function destroyItem(event, id){
            event.preventDefault();
            Swal.fire({
                title: 'حذف تنظیمات',
                text: "آیا از حذف تنظیمات سئو مطمئن هستید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله, مطمئن هستم!',
                cancelButtonText: 'نه حذف نکن'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('#delete-item-'+id).submit();
                }
            })

        }

    </script>

@endsection
