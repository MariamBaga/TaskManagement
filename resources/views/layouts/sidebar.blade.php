<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-5 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <img src="{{ asset('assets/images/logoTaskerate.jpeg') }}" alt="Logo Taskerate" width="40"
                    height="40">
            </span>
            <span class="logo-text">Mes-Tâches</span>
        </a>

        <!-- Menu: liste principale ul -->

        <ul class="menu-list flex-grow-1 mt-3">
            <li class="collapsed">
                <!-- Menu: Sous-menu ul -->
                <a class="m-link @if (Route::is('dashboard')) active @endif" data-bs-toggle="collapse"
                    data-bs-target="#dashboard-Components" href="#">
                    <i class="icofont-home fs-5"></i> <span>Dashboard</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <ul class="sub-menu collapse @if (Route::is('dashboard')) show @endif" id="dashboard-Components">
                    <li><a class="ms-link @if (Route::is('dashboard')) active @endif"
                            href="{{ route('dashboard') }}"> <span>Tableau de bord
                                Projet</span></a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link @if (request()->routeIs(['projects.index', 'tasks.index'])) active @endif" data-bs-toggle="collapse"
                    data-bs-target="#project-Components" href="#">
                    <i class="icofont-briefcase"></i><span>Projets</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse @if (request()->routeIs(['tasks.index', 'projects.index'])) show @endif" id="project-Components">
                    <li><a class="ms-link @if (request()->routeIs(['projects.index'])) active @endif"
                            href="{{ route('projects.index') }}"><span>Projets</span></a></li>
                    <li><a class="ms-link @if (request()->routeIs(['tasks.index'])) active @endif"
                            href="{{ route('tasks.index') }}"><span>Tâches</span></a></li>
                </ul>
            </li>


            @admin
                <li class="collapsed">
                    <a class="m-link @if (Route::is('users.index')) active @endif" data-bs-toggle="collapse"
                        data-bs-target="#emp-Components" href="#"><i class="icofont-users-alt-5"></i>
                        <span>Comptes</span> <span class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                    <!-- Menu: Sous-menu ul -->
                    <ul class="sub-menu collapse @if (Route::is('users.index')) show @endif" id="emp-Components">
                        <li><a class="ms-link @if (Route::is('users.index')) active @endif"
                                href="{{ route('users.index') }}"> <span>Utilisateurs</span></a></li>
                        {{-- <li><a class="ms-link" href="{{ route('employeeProfile.index') }}"> <span>Profil des
                                Membres</span></a></li> --}}
                    </ul>
                </li>
            @endadmin
        </ul>
    </div>
</div>
