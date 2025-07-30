<div class="header-navbar">
    <div class="container header-flex">
        <!-- LOGO -->
        <a href="/" class="topnav-logo" style="float: none;">
            <img src="{{ picture_ulr(dujiaoka_config_get('img_logo')) }}" height="36">
            <div class="logo-title">{{ dujiaoka_config_get('text_logo') }}</div>
        </a>
        <div class="d-flex">
            <a class="btn btn-outline-primary mr-2" href="{{ url('order-search') }}">
                <i class="noti-icon uil-file-search-alt search-icon"></i>
                查询订单
            </a>
            @guest
                <a class="btn btn-outline-success mr-2" href="{{ url('login') }}">
                    <i class="noti-icon uil-user"></i>
                    登入
                </a>
                <a class="btn btn-outline-info" href="{{ url('register') }}">
                    <i class="noti-icon uil-user-plus"></i>
                    註冊
                </a>
            @else
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="noti-icon uil-user-circle"></i>
                        {{ Auth::user()->name }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ url('profile') }}">個人資料</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            登出
                        </a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</div>