@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات بخش پروژه ها</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عکس</th>
                <th>درباره عکس</th>
                <th>عنوان پروژه</th>
                <th>درباره پروژه</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($project as $item)
                <tr>
                    <td><img src="{{asset('back/images/project/'.$item->image)}}"  width="90" alt=""></td>
                    <td>{{$item->alt}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>

                    <td><a href="{{route('project.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('project.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('project.create')}}" class="panel-btn mb-5">تنظیم بخش پروژه ها</a>

                {{  $project->links()  }}

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
