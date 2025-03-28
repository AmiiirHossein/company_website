@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات بخش مقدمه</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس صفحه</th>
                <th>عنوان</th>
                <th> درباره</th>
                <th>لینک</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($intro as $item)
                <tr>
                    <td><img src="{{asset('back/images/intro/'.$item->image)}}" width="150" alt=""></td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->link}}</td>

                    <td><a href="{{route('intro.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('intro.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('intro.create')}}" class="panel-btn">تنظیم بخش مقدمه</a>

        {{--        {{  $users->links()  }}--}}

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
                text: "آیا از حذف تنظیمات مطمئن هستید؟",
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
