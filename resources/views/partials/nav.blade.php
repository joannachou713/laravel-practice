<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top navbar-shadow">
    <div class="container">
        <a href="{{route('index')}}" style="font-size:25px; color:rgba(0,0,0,.9);font-family: Nunito,sans-serif;">Hello Blog</a>
        <form action="{{route('search')}}" method="GET" class="form-inline ml-3" role="search">
            <input type="search" class="form-control form-control-md mr-md-2" name="keyword" placeholder="搜尋文章" aria-label="Search">
            <button type="submit" class="btn btn-md btn-outline-info my-2 my-md-0"><i class="fas fa-search"></i>搜尋</button>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a href="#" class="nav-link">{{Auth::user()->name}}</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault(); $('#logout-form').submit();">登出</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">登入</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<div style="padding-top: 70px;"></div>