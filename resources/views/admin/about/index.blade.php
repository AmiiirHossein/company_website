@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیم بخش درباره ما</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس صفحه</th>
                <th>درباره عکس</th>
                <th> عنوان</th>
                <th>درباره عنوان</th>
                <th>درباره شرکت</th>
                <th>سابقه کار</th>
                <th>درباره سابقه کار</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($about as $item)
                <tr>
                    <td><img src="{{asset('back/images/about/'.$item->image)}}" width="150" alt=""></td>
                    <td>{{$item->alt}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->subtitle,15)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->description, 15)}}</td>
                    <td>{{$item->experience_title}}</td>
                    <td>{{$item->experience_desc}}</td>

                    <td><a href="{{route('about.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroySeo(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('about.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('about.create')}}" class="panel-btn">تنظیم بخش درباره ما</a>

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
