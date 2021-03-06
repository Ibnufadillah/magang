@if (auth()->user())
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('template')}}/img/AdminLTELogo.png" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: 0.8" />
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->mahasiswa)
          <img src="{{ url('foto_mhs/'.auth()->user()->mahasiswa->img_url) }}" class="img-circle elevation-2" alt="User Image" />
          @elseif(auth()->user()->dosen)
          <img src="{{ url('foto_dosen/'.auth()->user()->dosen->img_url) }}" class="img-circle elevation-2" alt="User Image" />
          @else
          <img src="{{ asset('template')}}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">
          @if (Auth::user()->mahasiswa)
          {{ Auth::user()->mahasiswa->nama }}
          @elseif(Auth::user()->dosen)
          {{ Auth::user()->dosen->nama }}              
          @else
          Admin
          @endif
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth()->user()->level == 1)
          <li class="nav-header">Menu</li>
          <li class="nav-item  {{ request()->is('admin/*') ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('admin/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/mhs" class="nav-link {{ request()->is('admin/mhs', 'admin/mhs/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahasiswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/dosen" class="nav-link {{ request()->is('admin/dosen', 'admin/dosen/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dosen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/matkul" class="nav-link {{ request()->is('admin/matkul', 'admin/matkul/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Kuliah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/perkuliahan" class="nav-link {{ request()->is('admin/perkuliahan', 'admin/perkuliahan/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perkuliahan</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif (auth()->user()->level == 2)
          <li class="nav-header">Menu</li>
          <li class="nav-item {{ request()->is('dosen/*') ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('dosen/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>
                Dosen
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dosen/profile" class="nav-link {{ request()->is('dosen/profile', 'dosen/profile/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dosen/mata-kuliah" class="nav-link {{ request()->is('dosen/mata-kuliah', 'dosen/mata-kuliah/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon "></i>
                  <p>Mata Kuliah</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon {{ request()->is('dosen/profile', 'dosen/profile/*') ? 'active' : ''}}"></i>
                  <p>Kelas</p>
                </a>
              </li> --}}
            </ul>
          </li>
          @elseif (auth()->user()->level == 3)
          <li class="nav-header">Menu</li>
          <li class="nav-item {{ request()->is('mahasiswa/*') ? 'menu-is-opening menu-open' : ''}}">
            <a href="#" class="nav-link {{ request()->is('mahasiswa/*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Mahasiswa
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/mahasiswa/profile/" class="nav-link {{ request()->is('mahasiswa/profile', 'mahasiswa/profile/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mahasiswa/mata-kuliah/" class="nav-link {{ request()->is('mahasiswa/mata-kuliah', 'mahasiswa/mata-kuliah/*') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Kuliah</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li> --}}
            </ul>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @endif
