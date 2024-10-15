<div class="nk-sidebar position-fixed">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="/home">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Kompetisi</li>
            <li>
                <a href="/kompetisi" aria-expanded="false">
                    <i class="icon-grid menu-icon"></i> <span class="nav-text">Semua Kompetisi</span>
                </a>

            </li>          
            
            <li class="nav-label">Lainnya</li>
            <li>
                <a href="/juara" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Informasi Peringkat</span>
                </a>
            </li>
            @if (Auth::user()->role == 'admin')
            <li>
                <a href="{{ url('/registrasi-list') }}" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text">Data Registrasi</span>
                </a>
            </li>
            <li> 
                <a href="/user" aria-expanded="false">
                    <i class="icon-people menu-icon"></i><span class="nav-text">Users</span>
                </a>
            </li>
            @endif
           
        </ul>
    </div>
</div>