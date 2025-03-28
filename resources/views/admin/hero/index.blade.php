@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم بخش خانه</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس صفحه</th>
                <th>درباره شرکت</th>
                <th>سال تاسیس</th>
                <th>لینک درباره</th>
                <th>لینک سوالات</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($hero as $item)
                <tr>
                    <td><img src="{{asset('back/images/hero/'.$item->image)}}" width="150" alt=""></td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->established}}</td>
                    <td>{{$item->about}}</td>
                    <td>{{$item->question}}</td>
                    <td><a href="{{route('home.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroySeo(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('home.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('home.create')}}" class="panel-btn">تنظیم بخش خانه</a>

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
        function destroySeo(event, id){
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
