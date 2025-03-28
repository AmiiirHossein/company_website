
<div id="mySlidenav" class="slidenav">
    <p class="logo"><span>R</span>uzmareh</p>


    <a href="{{route('front.index')}}" class="icon-a" target="_blank"><span class="icon"><i class="fas fa-eye"></i></span>نمایش وب سایت</a>
    <a href="{{route('dashboard')}}" class="icon-a  @if(request()->is('dashboard')) is-active  @endif"><span class="icon"><i class="fas fa-home"></i></span>داشبورد</a>
    @if(auth()->user()->role === 'admin')
        <a href="{{route('category.index')}}" class="icon-a  @if(request()->is('dashboard/category')) is-active  @endif"><span class="icon"><i class="fas fa-home"></i></span>دسته بندی ها</a>

        <a href="{{route('seo.index')}}" class="icon-a @if(request()->is('dashboard/seo')) is-active  @endif"><span class="icon"><i class="fas fa-magic"></i></span>سئو سایت</a>
        <a href="{{route('topHeader.index')}}" class="icon-a @if(request()->is('dashboard/topHeader')) is-active  @endif"><span class="icon"><i class="fas fa-ellipsis-h"></i></span>منوی بالایی</a>
        <a href="{{route('header.index')}}" class="icon-a @if(request()->is('dashboard/header')) is-active  @endif"><span class="icon"><i class="fas fa-bars"></i></span>منوی سایت </a>
        <a href="{{route('home.index')}}" class="icon-a @if(request()->is('dashboard/home')) is-active  @endif"><span class="icon"><i class="fas fa-laptop-house"></i></span>خانه</a>
        <a href="{{route('about.index')}}" class="icon-a @if(request()->is('dashboard/about')) is-active  @endif"><span class="icon "><i class="fas fa-address-card"></i></span>درباره ما</a>
        <a href="{{route('intro.index')}}" class="icon-a @if(request()->is('dashboard/intro')) is-active  @endif"><span class="icon"><i class="fas fa-book-open"></i></span>مقدمه</a>
        <a href="{{route('service.index')}}" class="icon-a @if(request()->is('dashboard/service')) is-active  @endif"><span class="icon"><i class="fas fa-cogs"></i></span>خدمات</a>
        <a href="{{route('counter.index')}}" class="icon-a @if(request()->is('dashboard/counter')) is-active  @endif"><span class="icon"><i class="fas fa-sort-numeric-up"></i></span>شمارنده</a>
        <a href="{{route('team.index')}}" class="icon-a @if(request()->is('dashboard/team')) is-active  @endif"><span class="icon"><i class="fas fa-user-friends"></i></span>تیم</a>
        <a href="{{route('project.index')}}" class="icon-a @if(request()->is('dashboard/project')) is-active  @endif"><span class="icon"><i class="fas fa-images"></i></span>پروژه ها</a>
        <a href="{{route('testimonial.index')}}" class="icon-a  @if(request()->is('dashboard/testimonial')) is-active  @endif"><span class="icon"><i class="fas fa-comment-alt"></i></span>نظرات مشتریان</a>
        <a href="{{route('faq.index')}}" class="icon-a @if(request()->is('dashboard/faq')) is-active  @endif"><span class="icon"><i class="fas fa-headset"></i></span>سوالات متداول</a>
        <a href="#" class="icon-a footer-panel"><span class="icon"><i class="fas fa-clipboard-list"></i></span>فوتر<i class="fas fa-chevron-down"></i></a>
        <div class="footer-submenu">
            <a href="{{route('footerAbout.index')}}" class="icon-a  @if(request()->is('dashboard/footerAbout')) is-active  @endif"><span class="icon"><i class="fas fa-clipboard-list"></i></span>فوتر - درباره ما</a>
            <a href="{{route('footerService.index')}}" class="icon-a @if(request()->is('dashboard/footerService')) is-active  @endif"><span class="icon"><i class="fas fa-clipboard-list"></i></span>فوتر - خدمات</a>
            <a href="{{route('footerQuick.index')}}" class="icon-a @if(request()->is('dashboard/footerQuick')) is-active  @endif"><span class="icon"><i class="fas fa-clipboard-list"></i></span>فوتر - دسترسی سریع</a>
            <a href="{{route('footerContact.index')}}" class="icon-a @if(request()->is('dashboard/footerContact')) is-active  @endif"><span class="icon"><i class="fas fa-clipboard-list"></i></span>فوتر - تماس با ما</a>
        </div>
        <a href="{{route('users.index')}}" class="icon-a @if(request()->is('dashboard/users')) is-active  @endif"><span class="icon"><i class="fas fa-users"></i></span>کاربران</a>

      @endif
      @if(auth()->user()->role === 'admin' || auth()->user()->role === 'author')
            <a href="{{route('comment.index')}}" class="icon-a @if(request()->is('dashboard/comment')) is-active  @endif"><span class="icon"><i class="fas fa-comment"></i></span>نظرات</a>
            <a href="{{route('contact.index')}}" class="icon-a @if(request()->is('dashboard/contact')) is-active  @endif"><span class="icon"><i class="fas fa-users"></i></span>پیام کاربران</a>
            <a href="{{route('blog.index')}}" class="icon-a @if(request()->is('dashboard/blog')) is-active  @endif"><span class="icon"><i class="fas fa-blog"></i></span>بلاگ</a>
    @endif




</div>
