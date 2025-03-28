@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات بخش خدمات</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس صفحه</th>
                <th>درباره عکس</th>
                <th> عنوان خدمت اول</th>
                <th>خدمت اول</th>
                <th> عنوان خدمت دوم</th>
                <th>خدمت دوم</th>
                <th> عنوان خدمت سوم</th>
                <th>خدمت سوم</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($service as $item)
                <tr>
                    <td><img src="{{asset('back/images/service/'.$item->image)}}" width="150" alt=""></td>
                    <td>{{$item->alt}}</td>
                    <td>{{$item->service_title_one}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->service_desc_one,10)}}</td>
                    <td>{{$item->service_title_two}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->service_desc_two,10)}}</td>
                    <td>{{$item->service_title_three}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->service_desc_three,10)}}</td>
                    <td><a href="{{route('service.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('service.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('service.create')}}" class="panel-btn">تنظیم بخش مقدمه</a>

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
