@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات منوی بالایی سایت</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>ایمیل</th>
                <th>تلفن تماس</th>
                <th>اینستاگرام</th>
                <th>فیسبوک</th>
                <th>توییتر</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($topHeader as $item)
                <tr>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->instagram}}</td>
                    <td>{{$item->facebook}}</td>
                    <td>{{$item->twitter}}</td>
                    <td><a href="{{route('topHeader.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('topHeader.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('topHeader.create')}}" class="panel-btn">تنظیم منو</a>

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
