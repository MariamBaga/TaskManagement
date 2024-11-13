<div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center">
<div class="u-info me-2">
    <!-- Affiche le nom complet de l'utilisateur connecté -->
    <p class="mb-0 text-end line-height-sm">
        <span class="font-weight-bold">{{ Auth::user()->name }}</span>
    </p>
    <!-- Affiche le rôle de l'utilisateur connecté -->
    <small>{{ Auth::user()->role === 'admin' ? 'Admin Profile' : 'Utilisateur Standard' }}</small>
</div>

    <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
        <!-- Utilise la photo de profil de l'utilisateur connecté -->
        <img class="avatar lg rounded-circle img-thumbnail" src="{{ Auth::user()->profile_picture_url ?? asset('assets/images/profile_av.png') }}" alt="profile">
    </a>
    <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
        <div class="card border-0 w280">
            <div class="card-body pb-0">
                <div class="d-flex py-1">
                    <img class="avatar rounded-circle" src="{{ Auth::user()->profile_picture_url ?? asset('assets/images/profile_av.png') }}" alt="profile">
                    <div class="flex-fill ms-3">
                        <p class="mb-0"><span class="font-weight-bold">{{ Auth::user()->name }}</span></p>
                        <small class="">{{ Auth::user()->email }}</small>
                    </div>
                </div>
                <div>
                    <hr class="dropdown-divider border-dark">
                </div>
            </div>
            <div class="list-group m-2">
                <a href="{{ route('tasks.index') }}" class="list-group-item list-group-item-action border-0"><i class="icofont-tasks fs-5 me-3"></i>My Task</a>
                <a href="{{ route('employee.index') }}" class="list-group-item list-group-item-action border-0"><i class="icofont-ui-user-group fs-6 me-3"></i>Members</a>
                <a href="{{ route('logout') }}" class="list-group-item list-group-item-action border-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icofont-logout fs-6 me-3"></i>Signout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <div>
                    <hr class="dropdown-divider border-dark">
                </div>
                <a href="{{ route('register') }}" class="list-group-item list-group-item-action border-0"><i class="icofont-contact-add fs-5 me-3"></i>Add personal account</a>
            </div>
        </div>
    </div>
</div>
