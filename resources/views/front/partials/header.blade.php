<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-lg">

            <div class="hamburger-menu">
                <i class="fas fa-bars"></i>
            </div>


            <ul class="navbar-nav">
                <div class="close-menu">
                    <i class="fas fa-times"></i>
                </div>

                @foreach($header as $item)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first) active @endif" href="{{$item->link}}">{{$item->title}}</a>
                    </li>
                @endforeach

            </ul>


            <div class="logo">
                <a href="">Ruzmareh</a>
            </div>
        </div>
    </nav>

    <div class="overlay-menu"></div>
</header>

<div class="auth-user">

    @guest
        <div class="auth-users">
            <a href="{{route('register')}}">ثبت نام</a>
            /
            <a href="{{route('login')}}">ورود</a>
        </div>

    @else
        <div class="profile">
            <div class="prof mb-3">
                <a href="{{route('dashboard')}}" target="_blank">پروفایل</a>
            </div>
            <div class="logout" style="cursor: pointer">
                <div onclick="logoutUser()">خروج</div>
            </div>
        </div>

        <form action="{{route('logout')}}" method="post" id="logout">
            @csrf
        </form>


    @endguest

    <div class="auth-user-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
</div>

