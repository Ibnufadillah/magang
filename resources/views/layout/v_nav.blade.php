@if (auth()->user())
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" href="/">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
                @if (auth()->user()->level == 1)
                    <div class="sb-sidenav-menu-heading"> Admin</div>
                    <a class="nav-link {{ request()->is('students', 'students/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                        Student
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('students', 'students/*') ? 'show' : ''}}" id="collapseData" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->is('students') ? 'active' : ''}}" href="/students">Student List</a>
                            <a class="nav-link {{ request()->is('students/add') ? 'active' : ''}}" href="/students/add">Add Student</a>
                        </nav>
                    </div>
                    <a class="nav-link {{ request()->is('teachers', 'teachers/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseTeacher" aria-expanded="false" aria-controls="collapseTeacher">
                        <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                        Teacher
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('teachers', 'teachers/*') ? 'show' : ''}}" id="collapseTeacher" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->is('teachers') ? 'active' : ''}}" href="/teachers">Teacher Data</a>
                            <a class="nav-link {{ request()->is('teachers/add') ? 'active' : ''}}" href="/teachers/add">Add Teacher</a>
                        </nav>
                    </div>
                    <div class="sb-sidenav-menu-heading">Setting</div>
                    <a class="nav-link {{ request()->is('admins', 'users') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('admins', 'users', 'admins/add', 'users/add') ? 'show' : ''}}" id="collapseUsers" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->is('admins') ? 'active' : ''}}" href="/admins">Manage Admin</a>
                        </nav>
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->is('users') ? 'active' : ''}}" href="/users">Manage User</a>
                        </nav>
                    </div>
                @elseif (auth()->user()->level == 2)
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    
                    <a class="nav-link {{ request()->is('user/*') ? 'active' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                        Akademik
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ request()->is('user/*') ? 'show' : ''}}" id="collapseData" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->is('user/profile') ? 'active' : ''}}"  href="/user/profile">Biodata</a>
                            <a class="nav-link {{ request()->is('user/schedule') ? 'active' : ''}}" href="/user/schedule">Jadwal</a>
                            <a class="nav-link {{ request()->is() ? 'active' : ''}}" href="#">Nilai</a>
                        </nav>
                    </div>
                @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <div class="row mt-2">
            <div class="col-auto">
                <img src="{{ asset('img/avatar.png') }}" alt="Admin" class="rounded-circle ml-1 mt-1" height="40">

            </div>
            <div class="col-ml-auto">
                {{ Auth::user()->name }} <br>

                @if (auth()->user()->level == 1)
                    <i class="fas fa-user-lock"></i>
                @elseif (auth()->user()->level == 2)
                    <i class="fas fa-user-graduate"></i>
                @endif
                   



            </div>

        </div>


    </div>
</nav>
@endif
