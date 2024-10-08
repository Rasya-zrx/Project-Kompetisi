<div class="nav-header position-fixed">
    <div class="brand-logo">
        <a href="/home">
            <b class="logo-abbr"><img src="/template/images/logo.png" alt=""></b>
            <span class="logo-compact"><img src="/template/images/logo-compact.png" alt=""></span>
            <span class="brand-title" color="black"></span>
        </a>
    </div>
</div>


<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i
                            class="mdi mdi-magnify"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                <div class="drop-down animated flipInX d-md-none">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                
                <li class="icons dropdown">
                    @auth
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">                           
                            <span class="activity active"></span>
                            <img src="images/user/1.png" height="40" width="40" alt="">
                            {{ auth()->user()->name }}
                        </div> 
                        <div class="drop-down dropdown-profile dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <li>
                                        <a href="app-profile.html"><i class="icon-user"></i> <span>Profile</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void()">
                                            <i class="icon-envelope-open"></i> <span>Inbox</span>
                                            <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                        </a>
                                    </li>

                                    <hr class="my-2">
                                    {{-- <li>
                                        <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock Screen</span></a>
                                    </li> --}}
                                    <li><a><i class="icon-key"></i> <span>Logout</span></a></li>
                                </ul>
                            </div>
                        </div>
                    @else
                    <div>
                        <h5><a href="{{ route('login') }}">Login</a></h5>
                    </div>
                    @endauth

                </li>
            </ul>
        </div>
    </div>
</div>
