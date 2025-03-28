@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>نظرات کاربران</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>نام کاربر</th>
                <th>پیام</th>
                <th>تایید پیام</th>
                <th>حذف</th>
            </tr>

            @foreach($comment as $item)
                <tr>

                    <td>{{$item->user->name}}</td>
                    <td>{{$item->description}}</td>
                    <td>
                        <a href="{{route('comment.edit', $item->id)}}" class="text-decoration-none">
                            @if($item->status === 0)

                                <p class="text-danger ">تایید نشده</p>

                            @else

                                <p class="text-success">تایید شده</p>

                            @endif

                        </a>
                    </td>
                    <td>
                        <a href="{{route('comment.destroy', $item->id)}}" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('comment.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


        {{  $comment->links()  }}

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
                title: 'حذف پیام',
                text: "آیا از حذف پیام مطمئن هستید؟",
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
