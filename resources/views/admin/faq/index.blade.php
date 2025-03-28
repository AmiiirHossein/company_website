@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>تنظیمات بخش سوالات متداول</h2>
        <table class="mb-5">
            <tbody>
            <tr>

                <th>عنوان</th>
                <th>پیام</th>
                <th>سوال اول</th>
                <th>محتوای سوال اول</th>
                <th>سوال دوم</th>
                <th>محتوای سوال دوم</th>
                <th>سوال سوم</th>
                <th>محتوای سوال سوم</th>

                <th>ویرایش</th>
                <th>حذف</th>
            </tr>

            @foreach($faq as $item)
                <tr>

                    <td>{{$item->title}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->description, 15)}}</td>
                    <td>{{$item->faq_one}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->faq_desc_one, 15)}}</td>
                    <td>{{$item->faq_two}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->faq_desc_two, 15)}}</td>
                    <td>{{$item->faq_three}}</td>
                    <td>{{\Illuminate\Support\Str::limit($item->faq_desc_three, 15)}}</td>

                    <td><a href="{{route('faq.edit', ['id'=> $item->id])}}" class="text-white text-decoration-none"> <i class="fas fa-edit"></i></a></td>
                    <td>
                        <a href="{{route('faq.destroy', $item->id)}}" class="text-decoration-none text-danger" onclick="destroyItem(event,{{$item->id}} )">حذف</a>
                        <form action="{{route('faq.destroy', $item->id)}}" method="post" id="delete-item-{{$item->id}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{route('faq.create')}}" class="panel-btn">ساخت بخش سوالات متداول</a>

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
