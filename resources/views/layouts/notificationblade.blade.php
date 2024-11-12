<div class="dropdown notifications">
    <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
        <i class="icofont-alarm fs-5"></i>
        <span class="pulse-ring"></span>
    </a>
    <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
        <div class="card border-0 w380">
            <div class="card-header border-0 p-3">
                <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                    <span>Notifications</span>
                    <span class="badge bg-primary text-white">{{ auth()->user()->unreadNotifications->count() }}</span>
                </h5>
            </div>
            <div class="tab-content card-body">
                <div class="tab-pane fade show active">
                    <ul class="list-unstyled list mb-0">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <li class="py-2 mb-1 border-bottom">
                                <a href="{{ $notification->data['url'] ?? '#' }}" class="d-flex">
                                    <img class="avatar rounded-circle" src="{{ asset('assets/images/xs/avatar1.jpg') }}" alt="profile image">
                                    <div class="flex-fill ms-2">
                                        <p class="d-flex justify-content-between mb-0">
                                            <span class="font-weight-bold">{{ $notification->data['user_name'] ?? 'Utilisateur' }}</span>
                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                        </p>
                                        <span>{{ $notification->data['message'] ?? 'Vous avez une notification.' }}</span>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="py-2 text-center text-muted">
                                Aucune nouvelle notification
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
            <a class="card-footer text-center border-top-0" href="{{ route('notifications.index') }}">Voir toutes les notifications</a>
        </div>
    </div>
</div>
