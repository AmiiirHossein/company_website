@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>کاربران سایت</h2>
        <table class="mb-5">
            <tbody>
            <tr>
                <th>نام</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>نقش کاربری</th>
                <th>تاریخ عضویت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{$user->RoleFarsi()}}</td>
                    <td>{{$user->Jalali()}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        @if(auth()->user()->id !== $user->id && $user->role !== 'admin')
                            <a href="{{route('users.destroy', $user->id)}}" class="text-decoration-none text-danger" onclick="destroyUser(event, {{$user->id}})">حذف</a>
                        @endif

                        <form action="{{route('users.destroy', $user->id)}}" method="post" id="delete-user-{{$user->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        {{  $users->links()  }}

    </div>

@endsection
@section('js')

    @if(Session::has('update'))
        <script>
            Swal.fire({
                icon: "success",
                title: 'تبریک میگم',
                text: "کاربر با موفقیت ویرایش شد.",
                confirmButtonText: "تایید",
            })
        </script>
    @endif


    <script>
        function destroyUser(event, id){
            event.preventDefault();
            Swal.fire({
                title: 'حذف کاربر',
                text: "آیا از حذف کاربر مطمئن هستید؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'بله, مطمئن هستم!',
                cancelButtonText: 'نه حذف نکن'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.querySelector('#delete-user-'+id).submit();
                }
            })

        }

    </script>

@endsection
