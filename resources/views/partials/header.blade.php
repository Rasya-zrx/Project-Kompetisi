<div class="nav-header position-fixed">
    <div class="brand-logo">
        <a href="/home">
            <b class="logo-abbr">
                <img src="/template/images/logo.png" alt="">
            </b>
            <span class="logo-compact">
                <img src="/template/images/logo.png" alt="">
            </span>
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
        
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    @auth
                        <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                            <img src="images/user/1.png" height="40" width="40" alt="">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="drop-down dropdown-profile dropdown-menu">
                            <div class="dropdown-content-body">
                                <ul>
                                    <!-- Edit Button -->
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#modaleditprofile">
                                            <i class="icon-user"></i>Edit User
                                        </a>
                                        
                                        
                                        <!-- Modal Edit -->
                                        
                                    </li>
                                    <hr class="my-2">
                                    <li>
                                        <form action="/logout" method="POST" id="logout-form">
                                            @csrf
                                            <button type="submit" style="background: none; border: none; padding: 0;">
                                                <i class="icon-logout menu-icon"></i> <span>Logout</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <div>
                            <h5><a href="/login">Login</a></h5>
                        </div>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleditprofile">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body pt-5">
                    <form action="/user/update/{{ auth()->user()->id }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email@gmail.com" value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" onclick="togglePassword()">
                                        <i class="fa fa-eye-slash" id="toggle-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @if (Auth::user()->role == 'admin')
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="" hidden>-- pilih role --</option>
                                <option value="admin" {{ auth()->user()->role == 'admin' ? 'selected' : '' }}>
                                    admin</option>
                                <option value="visitor" {{ auth()->user()->role == 'visitor' ? 'selected' : '' }}>
                                    visitor</option>
                            </select>
                        </div>
                        @endif
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-primary">Save Changes</button>
                        </div>
                    </form>       
                </div>
            </div>
        </div>
    </div>
</div>
