@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>پیام های کاربران</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>نام</th>
                <th>ایمیل</th>
                <th>موضوع</th>
                <th>پیام</th>

                <th>حذف</th>
            </tr>

            @foreach($contact as $item)
                <tr>
                    <td>{{$item->fullname}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->subject}}</td>
                    <td>{{$item->description}}</td>

                    <td>
                        <a href="{{route('contact.destroy', $item->id)}}" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('contact.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>


                {{  $contact->links()  }}

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
