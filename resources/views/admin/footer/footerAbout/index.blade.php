@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات فوتر - درباره ما</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عنوان</th>
                <th>متن</th>
                <th>لینک اینستاگرام</th>
                <th>لینک فیسبوک</th>
                <th>لینک توییتر</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($footerAbout as $item)
                <tr>

                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->instagram, 10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->facebook,10)}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->twitter,10)}}</td>


                    <td><a href="{{route('footerAbout.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="{{route('footerAbout.destroy', $item->id)}}" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('footerAbout.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('footerAbout.create')}}" class="panel-btn">تنظیمات  فوتر - درباره ما </a>

        {{--        {{  $project->links()  }}--}}

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
