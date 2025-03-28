@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات بخش نظرات مشتریان</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس</th>
                <th>درباره عکس</th>
                <th>نام مشتری</th>
                <th>شغل</th>
                <th>نظر مشتری</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($testimonial as $item)
                <tr>
                    <td><img src="{{asset('back/images/testimonial/'.$item->image)}}"  width="90" alt=""></td>
                    <td>{{$item->alt}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->job}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->description, 20)}}</td>

                    <td><a href="{{route('testimonial.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="{{route('project.destroy', $item->id)}}" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('testimonial.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('testimonial.create')}}" class="panel-btn">تنظیم بخش نظرات مشتریان</a>

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
