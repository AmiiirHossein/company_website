@extends('admin.index')

@section('content')
    <div class="dynamic-content">
        <h2>آخرین کاربران سایت</h2>
        <table>
            <tbody>
            <tr>
                <th>نام</th>
                <th>شماره موبایل</td>
                <th>ایمیل</td>
            </tr>

            @foreach($users as $item)

                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->mobile}}</td>
                    <td>{{$item->email}}</td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

@endsection
