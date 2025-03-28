@extends('front.layouts.master')

@section('content')
    @include('front.partials.top-header')
    @include('front.partials.header')
    <main class="detail-website py-5">
        <div class="container-lg py-5">
            <div class="row">
                <div class="col-lg-8">
                    <main class="main-detail">
                        <div class="row">
                            <div class="col-md-12 mt-5 mt-md-4">
                                <div class="blog-item p-2">
                                    <div class="blog-detail-title d-flex align-items-center justify-content-between">
                                        <h4 class="my-4">{{$blogDetail->subject}}</h4>
                                        <h5 class="blog-detail-author text-primary fs-6 ps-2"><i
                                                class="fas fa-user ms-2"></i>{{$blogDetail->user->name}}</h5>
                                    </div>
                                    <img src="{{asset('back/images/blog/'.$blogDetail->image)}}" class="w-100 img-detail"
                                         alt="">
                                    <div class="blog-detail-date border-bottom pb-2 d-flex justify-content-between">
                                        <h5 class="fs-6 mt-3 text-primary">{{$blogDetail->Jalali()}}</h5>
                                        <h5 class="fs-6 mt-3 text-primary">دسته بندی : {{$blogDetail->category->name}}</h5>
                                    </div>
                                    <p class="text-muted pt-4 fs-6 mt-3 mb-3">{{$blogDetail->body}}</p>


                                    <div class="comment-section py-5 mt-5">
                                        <h1 class="fs-3  pt-5 border-bottom pb-4 fw-bold">نظرات</h1>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="comment-item">
                                                    @foreach($comment as $item)

                                                        <div class="row py-3 border-bottom">
                                                            <div class="col-md-2 col-xl-1">
                                                                <div class="comment-item-img text-center">
                                                                    <img src="{{asset('front/images/testimonial/1.webp')}}" class=" rounded-circle img-thumbnail comment-img"  alt="">
                                                                </div>

                                                            </div>
                                                            <div class="col-md-10">
                                                                <div class="comment-item-text ">
                                                                    <div class="comment-item-text-title d-flex justify-content-between">
                                                                        <h4 class="fs-6 text-primary">{{$item->user->name}} </h4>
                                                                        <a href="#comment" onclick="setReplay({{$item->id}})" class="text-primary ps-3">پاسخ</a>
                                                                    </div>
                                                                    <p class="mt-1 text-muted">{{$item->description}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach($item->childs->where('status', 1) as $value)
                                                            <div class="comment-replay bg-dark py-3 pe-5 border-bottom">
                                                                <div class="row">
                                                                    <div class="col-md-2 col-xl-1">
                                                                        <div class="comment-item-img text-center">
                                                                            <img src="{{asset('front/images/testimonial/1.webp')}}" class=" rounded-circle img-thumbnail comment-img" alt="">
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="comment-item-text ">
                                                                            <h4 class="fs-6 text-primary">{{$value->user->name}}</h4>
                                                                            <p class="mt-2 text-white">{{$value->description}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if(auth()->check())
                                    <div class="comment">
                                        <form action="{{route('comment.ajax')}}" method="post" id="form">
                                            @csrf
                                            <div class="form-group mt-3">
                                                <div class="row w-100">
                                                    <div class="col-lg-12">
                                                        <textarea class="w-100 border p-3 form-control description" name="description" rows="8"
                                                                  placeholder="پیام شما..."></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="blog_id" value="{{$blogDetail->id}}">
                                            <input type="hidden" name="parent_id" id="replay-comment" value="">

                                            <button type="submit"
                                                    class="bg-primary  text-white border-0 p-2 px-5 mt-3 text-center">ارسال
                                                نظر</button>
                                        </form>
                                    </div>
                                    @else
                                        <p class="text-center p-5 bg-primary">برای ارسال نظر شما باید ابتدا وارد حساب کاربری خود شوید.</p>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </main>
                </div>
                <div class="col-lg-4 mt-5 mt-lg-4">
                    <aside class="sidebar">
                        <div class="row">
                            <div class="col-12 p-4">
                                <div class="sidebar-item-title ">
                                    <h6 class="mb-4">آخرین پروژه ها</h6>
                                </div>
                                @foreach($project as $item)
                                    <div class="sidebar-item align-items-center">

                                        <div class="sidebar-item-text pt-4 align-items-center  d-flex">
                                            <img src="{{asset('back/images/project/'.$item->image)}}"
                                                 class="img-thumbnail" alt="">
                                            <p class="px-2 fs-6 text-muted"><a href="" class="text-muted">{{$item->title}}</a></p>
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </main>

    @include('front.partials.footer')

@endsection



@section('js')

    <script>
        $('#form').submit(function(e){
            e.preventDefault();
            let description = $('textarea[name=description]').val();
            let blog_id = $('input[name=blog_id]').val();
            let parent_id = $('input[name=parent_id]').val();
            let token = $('input[name=_token]').val();
            let action = $('#form').attr('action');

            $.ajax({
                url: action,
                type: 'Post',
                data: {
                    description: description,
                    blog_id: blog_id,
                    parent_id: parent_id,
                    _token: token
                },
                success:function(data){
                    if (data == 1){
                        $.toast({
                            heading: 'با تشکر از شما',
                            text: 'پیام شما ارسال شد و بعد از تایید مدیریت به نمایش در می آید.',
                            icon: 'success',
                            position: 'bottom-right'
                        });
                        $('textarea[name=description]').val('');
                    }
                }
            })

        })
    </script>

    <script>
        function setReplay(id){
            document.querySelector('#replay-comment').value = id;
            const description = document.querySelector('.description');
            description.classList.add('active');
        }
    </script>

@endsection

@section('seo')
    @if(!empty($blogDetail))
        <title>{{$blogDetail->title}}</title>
        <meta name="description" content="{{$blogDetail->description}}">
        <meta name="keywords" content="{{$blogDetail->keywords}}">
        <meta property="og:title" content="{{$blogDetail->title}}">
        <meta property="og:description" content="{{$blogDetail->description}}">
    @else
        <title>شرکت ساختمانی روزمره </title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta property="og:site_name" value="">
        <meta property="og:title" content="">
        <meta property="og:url" content="">
        <meta property="og:description" content="">
        <meta name="twitter:title" content="">
        <meta name="twitter:description" content="">
    @endif
@endsection
