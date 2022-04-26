<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          
            <ul id="sidebarnav" class="p-t-30">
                @guest <li class="sidebar-item"> <b class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><span class="hide-menu">Login as: Guest</span></b></li>@endguest
                @auth<li class="sidebar-item"> <b class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false"><span class="hide-menu">Login as: {{ Auth::user()->name }}</span></b></li>@endauth
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/kategori" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Kategori</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/metode" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Metode</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/resep" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Daftar Resep</span></a></li>
                @auth
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/profile" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Profil</span></a></li>
                
                <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('logout') }}" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Logout</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
                </li>
                @endauth

                @guest
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/register" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Register</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/login" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Login</span></a></li>
                @endguest
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>