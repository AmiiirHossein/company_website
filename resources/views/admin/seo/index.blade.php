@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم سئو سایت</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عنوان سایت</th>
                <th>کلمات کلیدی</th>
                <th>درباره شرکت</th>
                <th>اسم سایت</th>
                <th>آدرس سایت</th>
                <th>نام توییتر</th>
                <th>درباره توییتر </th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($seos as $item)
                <tr>
                    <td>{{$item->title}}</td>
                    <td>{{$item->keywords}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->description, 30)}}</td>
                    <td>{{$item->site_name}}</td>
                    <td>{{$item->site_url}}</td>
                    <td>{{$item->twitter_name}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->twitter_description, 30)}}</td>
                    <td><a href="{{route('seo.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroySeo(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('seo.destroy', $item->id)}}" method="post" id="delete-seo-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('seo.create')}}" class="panel-btn">تنظیم سئو</a>

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
                    document.querySelector('#delete-seo-'+id).submit();
                }
            })

        }

    </script>

@endsection
