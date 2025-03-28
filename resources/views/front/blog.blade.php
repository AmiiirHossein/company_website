@extends('front.layouts.master')
@section('seo')
    <title>بلاگ های روزمره </title>
@endsection
@section('content')
    @include('front.partials.top-header')
    @include('front.partials.header')
    <main class="detail-website py-5">
        <div class="container-lg py-5">
            <div class="row">
                <div class="col-lg-8">
                    <main class="main-detail">
                        <div class="row pb-4">
                          @foreach($blog as $item)

                                <div class="col-md-6 mt-5 mt-md-4">
                                    <div class="blog-item p-2">
                                        <img src="{{asset('back/images/blog/'.$item->image)}}" class="w-100" alt="{{$item->alt}}">
                                        <h4 class="my-2">{{$item->subject}}</h4>
                                        <p class="text-muted fs-6 mt-3 mb-3">{{\Illuminate\Support\Str::limit($item->body, 40)}}</p>
                                        <a href="{{route('blog.detail', $item->id)}}" target="_blank" class="text-primary">برو بخونش</a>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                        {{$blog->links()}}
                    </main>
                </div>
                <div class="col-lg-4 mt-5 mt-lg-4">
                    <aside class="sidebar p-4">
                        <div class="row">
                            <div class="col-12 pb-5">
                                <div class="sidebar-item-title">
                                    <h6 class="mb-4">دسته بندی ها</h6>
                                </div>

                                @foreach($category as $item)

                                    <div class="sidebar-item align-items-center">
                                        <div class="sidebar-item-text pt-4 align-items-center  d-flex">
                                            <small class="px-2 fs-6 text-muted"><a href="{{ route('search', $item->id) }}">{{$item->name}}</a></small>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                            <div class="col-12">
                                <div class="sidebar-item-title">
                                    <h6 class="mb-4">پروژه های ما</h6>
                                </div>

                                @foreach($project as $item)

                                    <div class="sidebar-item align-items-center">

                                        <div class="sidebar-item-text pt-4 align-items-center  d-flex">
                                            <img src="{{asset('back/images/project/'.$item->image)}}" class="img-thumbnail" alt="">
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
