@extends('main')
@section('title', 'Nouveau projet')
@section('head')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <style>
            .select2-selection__rendered {
                line-height: 41px !important;
            }

            .select2-container .select2-selection--single {
                height: 40px !important;
            }

            .select2-selection__arrow {
                height: 40px !important;
            }

            .select2-results__option span i {
                margin-right: 5px;
            }

            /* .modal-backdrop {
                                                                                                                                            z-index: -1;
                                                                                                                                        } */
        </style>
    @section('title', 'Nouveau Projet')
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/my-task.style.min.css') }}">
</head>
@endsection
@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div
                    class="card-header p-0 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold py-3 mb-0">Projets</h3>
                    <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                        <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal"
                            data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Ajouter
                            Un Projet</button>
                        <ul class="nav nav-tabs tab-body-header rounded ms-3 prtab-set w-sm-100" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#All-list"
                                    role="tab">Tous</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Started-list"
                                    role="tab">Elévée</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Approval-list"
                                    role="tab">Moyenne</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Completed-list"
                                    role="tab">Faible</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end  -->
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 flex-column">
                <div class="tab-content mt-4">
                    {{-- all projects list --}}
                    <div class="tab-pane fade show active" id="All-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            @if ($projects->count() > 0)
                                @foreach ($projects as $project)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-orange-bg">
                                                            <i class="{{ $project->icon }}"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $project->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $project->nom }}</h6>
                                                    </div>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editproject{{ $project->id }}"><i
                                                                class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteproject{{ $project->id }}"><i
                                                                class="icofont-ui-delete text-danger"></i></button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list avatar-list-stacked pt-2">
                                                        @foreach ($project->users as $user)
                                                            <img class="avatar rounded-circle sm"
                                                                src="{{ asset('storage/' . $user->image) }}" alt="">
                                                        @endforeach
                                                        {{-- <span class="avatar rounded-circle text-center pointer sm"
                                                            data-bs-toggle="modal" data-bs-target="#addUser"><i
                                                                class="icofont-ui-add"></i></span> --}}
                                                    </div>
                                                </div>
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-paper-clip"></i>
                                                            <span class="ms-2">{{ $project->tasks->count()>1 ? $project->tasks->count()." tâches" : $project->tasks->count()." tâche" }}
                                                                </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span
                                                                class="ms-2">{{ number_format($project->date_debut->diffInMonths($project->date_fin), 0, '', '') }}
                                                                Mois</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span
                                                                class="ms-2">{{ $project->users()->count() > 1 ? $project->users()->count() . ' Membres' : $project->users()->count() . ' Membre' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Progrès</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i
                                                            class="icofont-ui-clock"></i>
                                                        {{ $project->date_debut->diffInDays($project->date_fin) }}
                                                        Jours</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                        style="width: @if($project->statut =='debut') 5% @elseif($project->statut =='encours') 50% @else 100% @endif;" aria-valuenow="15" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    {{-- <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Started-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            @if ($hight_projects->count() > 0)
                                @foreach ($hight_projects as $project)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-orange-bg">
                                                            <i class="{{ $project->icon }}"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $project->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $project->nom }}</h6>
                                                    </div>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editproject{{ $project->id }}"><i
                                                                class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteproject{{ $project->id }}"><i
                                                                class="icofont-ui-delete text-danger"></i></button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list avatar-list-stacked pt-2">
                                                        @foreach ($project->users as $user)
                                                            <img class="avatar rounded-circle sm"
                                                                src="{{ $user->image }}" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar1.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar3.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar4.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar8.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar10.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar11.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar6.jpg" alt="">
                                                        @endforeach
                                                        <span class="avatar rounded-circle text-center pointer sm"
                                                            data-bs-toggle="modal" data-bs-target="#addUser"><i
                                                                class="icofont-ui-add"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-paper-clip"></i>
                                                            <span class="ms-2">{{ $project->tasks->count() }}
                                                                Attachement</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span
                                                                class="ms-2">{{ number_format($project->date_debut->diffInMonths($project->date_fin), 0, '', '') }}
                                                                Mois</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span
                                                                class="ms-2">{{ $project->users()->count() > 1 ? $project->users()->count() . ' Membres' : $project->users()->count() . ' Membre' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-ui-text-chat"></i>
                                                            <span class="ms-2">45</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Progrès</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i
                                                            class="icofont-ui-clock"></i>
                                                        {{ $project->date_debut->diffInDays($project->date_fin) }}
                                                        Jours</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                        style="width: 25%" aria-valuenow="15" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Approval-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            @if ($important_projects->count() > 0)
                                @foreach ($important_projects as $project)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-orange-bg">
                                                            <i class="{{ $project->icon }}"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $project->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $project->nom }}</h6>
                                                    </div>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editproject{{ $project->id }}"><i
                                                                class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteproject{{ $project->id }}"><i
                                                                class="icofont-ui-delete text-danger"></i></button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list avatar-list-stacked pt-2">
                                                        @foreach ($project->users as $user)
                                                            <img class="avatar rounded-circle sm"
                                                                src="{{ $user->image }}" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar1.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar3.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar4.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar8.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar10.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar11.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar6.jpg" alt="">
                                                        @endforeach
                                                        <span class="avatar rounded-circle text-center pointer sm"
                                                            data-bs-toggle="modal" data-bs-target="#addUser"><i
                                                                class="icofont-ui-add"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-paper-clip"></i>
                                                            <span class="ms-2">{{ $project->tasks->count() }}
                                                                Attachement</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span
                                                                class="ms-2">{{ number_format($project->date_debut->diffInMonths($project->date_fin), 0, '', '') }}
                                                                Mois</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span
                                                                class="ms-2">{{ $project->users()->count() > 1 ? $project->users()->count() . ' Membres' : $project->users()->count() . ' Membre' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-ui-text-chat"></i>
                                                            <span class="ms-2">45</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Progrès</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i
                                                            class="icofont-ui-clock"></i>
                                                        {{ $project->date_debut->diffInDays($project->date_fin) }}
                                                        Jours</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                        style="width: 25%" aria-valuenow="15" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Completed-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            @if ($low_projects->count() > 0)
                                @foreach ($low_projects as $project)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                    <div class="lesson_name">
                                                        <div class="project-block light-orange-bg">
                                                            <i class="{{ $project->icon }}"></i>
                                                        </div>
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $project->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $project->nom }}</h6>
                                                    </div>
                                                    <div class="btn-group" role="group"
                                                        aria-label="Basic outlined example">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editproject{{ $project->id }}"><i
                                                                class="icofont-edit text-success"></i></button>
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteproject{{ $project->id }}"><i
                                                                class="icofont-ui-delete text-danger"></i></button>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-list avatar-list-stacked pt-2">
                                                        @foreach ($project->users as $user)
                                                            <img class="avatar rounded-circle sm"
                                                                src="{{ $user->image }}" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar1.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar3.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar4.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar8.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar10.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar11.jpg" alt="">
                                                            <img class="avatar rounded-circle sm"
                                                                src="assets/images/xs/avatar6.jpg" alt="">
                                                        @endforeach
                                                        <span class="avatar rounded-circle text-center pointer sm"
                                                            data-bs-toggle="modal" data-bs-target="#addUser"><i
                                                                class="icofont-ui-add"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row g-2 pt-4">
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-paper-clip"></i>
                                                            <span class="ms-2">{{ $project->tasks->count() }}
                                                                Attachement</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-sand-clock"></i>
                                                            <span
                                                                class="ms-2">{{ number_format($project->date_debut->diffInMonths($project->date_fin), 0, '', '') }}
                                                                Mois</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-group-students "></i>
                                                            <span
                                                                class="ms-2">{{ $project->users()->count() > 1 ? $project->users()->count() . ' Membres' : $project->users()->count() . ' Membre' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex align-items-center">
                                                            <i class="icofont-ui-text-chat"></i>
                                                            <span class="ms-2">45</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dividers-block"></div>
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h4 class="small fw-bold mb-0">Progrès</h4>
                                                    <span class="small light-danger-bg  p-1 rounded"><i
                                                            class="icofont-ui-clock"></i>
                                                        {{ $project->date_debut->diffInDays($project->date_fin) }}
                                                        Jours</span>
                                                </div>
                                                <div class="progress" style="height: 8px;">
                                                    <div class="progress-bar bg-secondary" role="progressbar"
                                                        style="width: 25%" aria-valuenow="15" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                    <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                        style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                        aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create Project-->
<div class="modal fade" id="createproject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Ajouter un Projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput77" class="form-label">Nom du projet</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                id="exampleFormControlInput77" placeholder="Explain what the Project Name"
                                name="nom" value="{{ old('nom') ?? '' }}">
                            @error('nom')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Categorie projet</label>
                            <select class="form-select @error('category') is-invalid @enderror"
                                aria-label="Default select Project Category" name="category">
                                <option value="UI/UX Design"
                                    {{ old('category') == 'UI/UX Design' ? 'selected' : '' }}>
                                    UI/UX Design</option>
                                <option value="Website Design"
                                    {{ old('category') == 'Website Design' ? 'selected' : '' }}>Website Design</option>
                                <option value="App Development"
                                    {{ old('category') == 'App Development' ? 'selected' : '' }}>App Development
                                </option>
                                <option value="Quality Assurance"
                                    {{ old('category') == 'Quality Assurance' ? 'selected' : '' }}>Quality Assurance
                                </option>
                                <option value="Development" {{ old('category') == 'Development' ? 'selected' : '' }}>
                                    Development</option>
                                <option value="Backend Development"
                                    {{ old('category') == 'Backend Development' ? 'selected' : '' }}>Backend
                                    Development
                                </option>
                                <option value="Software Testing"
                                    {{ old('category') == 'Software Testing' ? 'selected' : '' }}>Software Testing
                                </option>
                                <option value="Website Design"
                                    {{ old('category') == 'Website Design' ? 'selected' : '' }}>Website Design</option>
                                <option value="Marketing" {{ old('category') == 'Marketing' ? 'selected' : '' }}>
                                    Marketing</option>
                                <option value="SEO" {{ old('category' == 'SEO') ? 'selected' : '' }}>SEO</option>
                                <option value="Other" {{ old('category') == 'Other' ? 'selected' : '' }}>Other
                                </option>
                            </select>
                            @error('category')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultipleone" class="form-label select2-icon"> Icon</label>
                            <select id="icon" class="form-select" name="icon">
                                <option value="" disabled selected>...</option>
                                <option value="fas fa-align-left">fas fa-align-left</option>
                                <option value="fas fa-align-right">fas fa-align-right</option>
                                <option value="fab fa-amazon">fab fa-amazon</option>
                                <option value="fas fa-ambulance">fas fa-ambulance</option>
                                <option value="fas fa-anchor">fas fa-anchor</option>
                                <option value="fab fa-android">fab fa-android</option>
                                <option value="fab fa-angellist">fab fa-angellist</option>
                                <option value="fas fa-angle-double-down">fas fa-angle-double-down</option>
                                <option value="fas fa-angle-double-left">fas fa-angle-double-left</option>
                                <option value="fas fa-angle-double-right">fas fa-angle-double-right</option>
                                <option value="fas fa-angle-double-up">fas fa-angle-double-up</option>

                                <option value="fas fa-angle-left">fas fa-angle-left</option>
                                <option value="fas fa-angle-right">fas fa-angle-right</option>
                                <option value="fas fa-angle-up">fas fa-angle-up</option>
                                <option value="fab fa-apple">fab fa-apple</option>
                                <option value="fas fa-archive">fas fa-archive</option>
                                <option value="fas fa-arrow-circle-down">fas fa-arrow-circle-down</option>
                                <option value="fas fa-arrow-circle-left">fas fa-arrow-circle-left</option>
                                <option value="fas fa-arrow-circle-down">fas fa-arrow-circle-down</option>
                                <option value="fas fa-arrow-circle-left">fas fa-arrow-circle-left</option>
                                <option value="fas fa-arrow-circle-right">fas fa-arrow-circle-right</option>
                                <option value="fas fa-arrow-circle-up">fas fa-arrow-circle-up</option>
                                <option value="fas fa-arrow-circle-right">fas fa-arrow-circle-right</option>
                                <option value="fas fa-arrow-circle-up">fas fa-arrow-circle-up</option>
                                <option value="fas fa-arrow-down">fas fa-arrow-down</option>
                                <option value="fas fa-arrow-left">fas fa-arrow-left</option>
                                <option value="fas fa-arrow-right">fas fa-arrow-right</option>
                                <option value="fas fa-arrow-up">fas fa-arrow-up</option>
                                <option value="fas fa-people-arrows">fas fa-people-arrows</option>
                                <option value="fas fa-arrows-alt">fas fa-arrows-alt</option>
                                <option value="fas fa-arrows-alt-h">fas fa-arrows-alt-h</option>
                                <option value="fas fa-arrows-alt-v">fas fa-arrows-alt-v</option>
                                <option value="fas fa-asterisk">fas fa-asterisk</option>
                                <option value="fas fa-at">fas fas fa-at</option>
                                <option value="fas fa-bus-alt">fas fa-bus-alt</option>
                                <option value="fas fa-backward">fas fa-backward</option>
                                <option value="fas fa-balance-scale">fas fa-balance-scale</option>
                                <option value="fas fa-ban">fas fa-ban</option>
                                <option value="fas fa-chart-bar">fas fa-chart-bar</option>
                                <option value="far fa-chart-bar">far fa-chart-bar</option>

                                <option value="fas fa-battery-full">fas fa-battery-full</option>
                                <option value="fas fa-beer">fas fa-beer</option>
                                <option value="far fa-bell">far fa-bell</option>
                                <option value="fas fa-bell">fas fa-bell</option>
                                <option value="fas fa-bell-slash">fas fa-bell-slash</option>
                                <option value="far fa-bell-slash">far fa-bell-slash</option>
                                <option value="fas fa-bicycle">fas fa-bicycle</option>
                                <option value="fas fa-binoculars">fas fa-binoculars</option>
                                <option value="fas fa-birthday-cake">fas fa-birthday-cake</option>
                                <option value="fab fa-bitcoin">fab fa-bitcoin</option>
                                <option value="fab fa-black-tie">fab fa-black-tie</option>
                                <option value="fas fa-bold">fas fa-bold</option>
                                <option value="fas fa-bolt">fas fa-bolt</option>
                                <option value="fas fa-bomb">fas fa-bomb</option>
                                <option value="fas fa-book">fas fa-book</option>
                                <option value="fas fa-bookmark">fas fa-bookmark</option>
                                <option value="fas fa-bookmark">fas fa-bookmark</option>
                                <option value="fas fa-briefcase">fas fa-briefcase</option>
                                <option value="fas fa-bug">fas fa-bug</option>
                                <option value="fas fa-building">fas fa-building</option>
                                <option value="far fa-building">far fa-building</option>
                                <option value="fas fa-bullhorn">fas fa-bullhorn</option>
                                <option value="fas fa-bullseye">fas fa-bullseye</option>
                                <option value="fas fa-bus">fas fa-bus</option>
                                <option value="fas fa-calendar">fas fa-calendar</option>
                                <option value="fas fa-camera">fas fa-camera</option>
                                <option value="fas fa-car">fas fa-car</option>
                                <option value="fas fa-caret-up">fas fa-caret-up</option>
                                <option value="fas fa-cart-plus">fas fa-cart-plus</option>
                                <option value="fab fa-cc-amex">fab fa-cc-amex</option>
                                <option value="fab fa-cc-jcb">fab fa-cc-jcb</option>
                                <option value="fab fa-cc-paypal">fab fa-cc-paypal</option>
                                <option value="fab fa-cc-stripe">fab fa-cc-stripe</option>
                                <option value="fab fa-cc-visa">fab fa-cc-visa</option>
                                <option value="fas fa-check">fas fa-check</option>
                                <option value="fas fa-chevron-left">fas fa-chevron-left</option>
                                <option value="fas fa-chevron-right">fas fa-chevron-right</option>
                                <option value="fas fa-chevron-up">fas fa-chevron-up</option>
                                <option value="fas fa-child">fas fa-child</option>
                                <option value="fab fa-chrome">fab fa-chrome</option>
                                <option value="fas fa-circle">fas fa-circle</option>
                                <option value="far fa-circle">far fa-circle</option>
                                <option value="fas fa-circle-notch">fas fa-circle-notch</option>
                                <option value="fas fa-smile-wink">fas fa-smile-wink</option>
                                <option value="fas fa-clipboard">fas fa-clipboard</option>
                                <option value="fas fa-clock">fas fa-clock</option>
                                <option value="fas fa-clone">fas fa-clone</option>
                                <option value="far fa-times-circle">far fa-times-circle</option>
                                <option value="fas fa-cloud">fas fa-cloud</option>
                                <option value="fas fa-cloud-download-alt">fas fa-cloud-download-alt</option>
                                <option value="fas fa-cloud-upload-alt">fas fa-cloud-upload</option>
                                <option value="fas fa-code">fas fa-code</option>
                                <option value="fas fa-code-branch">fas fa-code-branch</option>
                                <option value="fab fa-codepen">fab fa-codepen</option>
                                <option value="fas fa-coffee">fas fa-coffee</option>
                                <option value="fas fa-cog">fas fa-cog</option>
                                <option value="fas fa-cogs">fas fa-cogs</option>
                                <option value="fas fa-columns">fas fa-columns</option>
                                <option value="fas fa-comment">fas fa-comment</option>
                                <option value="far fa-comment">far fa-comment</option>
                                <option value="fas fa-comment-dots">fas fa-comment-dots</option>
                                <option value="fas fa-comment-dollar">fas fa-comment-dollar</option>
                                <option value="fas fa-comments">fas fa-comments</option>
                                <option value="fas fa-comments-dollar">fas fa-comments-dollar</option>
                                <option value="fas fa-compass">fas fa-compass</option>
                                <option value="fas fa-compress">fas fa-compress</option>
                                <option value="fas fa-copy">fas fa-copy</option>
                                <option value="fas fa-copyright">fas fa-copyright</option>
                                <option value="fab fa-creative-commons">fab fa-creative-commons</option>
                                <option value="fas fa-credit-card">fas fa-credit-card</option>
                                <option value="fas fa-crop">fas fa-crop</option>
                                <option value="fas fa-crosshairs">fas fa-crosshairs</option>
                                <option value="fas fa-cube">fas fa-cube</option>
                                <option value="fas fa-cubes">fas fa-cubes</option>
                                <option value="fas fa-cut">fas fa-cut</option>
                                <option value="fas fa-database">fas fa-database</option>
                                <option value="fab fa-delicious">fab fa-delicious</option>
                                <option value="fas fa-desktop">fas fa-desktop</option>
                                <option value="fas fa-dollar-sign">fas fa-dollar-sign</option>
                                <option value="fas fa-download">fas fa-download</option>
                                <option value="fas fa-dribbble">fas fa-dribbble</option>
                                <option value="fas fa-dropbox">fas fa-dropbox</option>
                                <option value="fas fa-drupal">fas fa-drupal</option>
                                <option value="fas fa-edit">fas fa-edit</option>
                                <option value="fas fa-eject">fas fa-eject</option>
                                <option value="fas fa-ellipsis-h">fas fa-ellipsis-h</option>
                                <option value="fas fa-ellipsis-v">fas fa-ellipsis-v</option>
                                <option value="fas fa-empire">fas fa-empire</option>
                                <option value="fas fa-envelope">fas fa-envelope</option>
                                <option value="fas fa-envelope">fas fa-envelope</option>
                                <option value="fas fa-eur">fas fa-eur</option>
                                <option value="fas fa-euro">fas fa-euro</option>
                                <option value="fas fa-exchange">fas fa-exchange</option>
                                <option value="fas fa-exclamation">fas fa-exclamation</option>
                                <option value="fas fa-exclamation-circle">fas fa-exclamation-circle</option>
                                <option value="fas fa-exclamation-triangle">fas fa-exclamation-triangle</option>
                                <option value="fas fa-expand">fas fa-expand</option>
                                <option value="fas fa-expeditedssl">fas fa-expeditedssl</option>
                                <option value="fas fa-external-link">fas fa-external-link</option>
                                <option value="fas fa-external-link-square">fas fa-external-link-square</option>
                                <option value="fas fa-eye">fas fa-eye</option>
                                <option value="fas fa-eye-slash">fas fa-eye-slash</option>
                                <option value="fas fa-eyedropper">fas fa-eyedropper</option>
                                <option value="fas fa-fas facebook">fas fa-fas facebook</option>
                                <option value="fas fa-fas facebook-f">fas fa-fas facebook-f</option>
                                <option value="fas fa-fas facebookfficial">fas fa-fas facebookfficial</option>
                                <option value="fas fa-fas facebook-square">fas fa-fas facebook-square</option>
                                <option value="fas fa-fas fast-backward">fas fa-fas fast-backward</option>
                                <option value="fas fa-fas fast-forward">fas fa-fas fast-forward</option>
                                <option value="fas fa-fas fax">fas fa-fas fax</option>
                                <option value="fas fa-feed">fas fa-feed</option>
                                <option value="fas fa-female">fas fa-female</option>
                                <option value="fas fa-fighter-jet">fas fa-fighter-jet</option>
                                <option value="fas fa-file">fas fa-file</option>
                                <option value="fas fa-file-archive">fas fa-file-archive</option>
                                <option value="fas fa-file-audio">fas fa-file-audio</option>
                                <option value="fas fa-file-code">fas fa-file-code</option>
                                <option value="fas fa-file-excel">fas fa-file-excel</option>
                                <option value="fas fa-file-image">fas fa-file-image</option>
                                <option value="fas fa-file-movie">fas fa-file-movie</option>
                                <option value="fas fa-file">fas fa-file</option>
                                <option value="fas fa-file-pdf">fas fa-file-pdf</option>
                                <option value="fas fa-file-photo">fas fa-file-photo</option>
                                <option value="fas fa-file-picture">fas fa-file-picture</option>
                                <option value="fas fa-file-powerpoint">fas fa-file-powerpoint</option>
                                <option value="fas fa-file-sound">fas fa-file-sound</option>
                                <option value="fas fa-file-text">fas fa-file-text</option>
                                <option value="fas fa-file-text">fas fa-file-text</option>
                                <option value="fas fa-file-video">fas fa-file-video</option>
                                <option value="fas fa-file-word">fas fa-file-word</option>
                                <option value="fas fa-file-zip">fas fa-file-zip</option>
                                <option value="fas fa-files">fas fa-files</option>
                                <option value="fas fa-film">fas fa-film</option>
                                <option value="fas fa-filter">fas fa-filter</option>
                                <option value="fas fa-fire">fas fa-fire</option>
                                <option value="fas fa-fire-extinguisher">fas fa-fire-extinguisher</option>
                                <option value="fas fa-firefox">fas fa-firefox</option>
                                <option value="fas fa-flag">fas fa-flag</option>
                                <option value="fas fa-flag-checkered">fas fa-flag-checkered</option>
                                <option value="fas fa-flag">fas fa-flag</option>
                                <option value="fas fa-flash">fas fa-flash</option>
                                <option value="fas fa-flask">fas fa-flask</option>
                                <option value="fas fa-flickr">fas fa-flickr</option>
                                <option value="fas fa-floppy">fas fa-floppy</option>
                                <option value="fas fa-folder">fas fa-folder</option>
                                <option value="fas fa-folder">fas fa-folder</option>
                                <option value="fas fa-folderpen">fas fa-folderpen</option>
                                <option value="fas fa-folderpen">fas fa-folderpen</option>
                                <option value="fas fa-font">fas fa-font</option>
                                <option value="fas fa-fonticons">fas fa-fonticons</option>
                                <option value="fas fa-forumbee">fas fa-forumbee</option>
                                <option value="fas fa-forward">fas fa-forward</option>
                                <option value="fas fa-foursquare">fas fa-foursquare</option>
                                <option value="fas fa-frown">fas fa-frown</option>
                                <option value="fas fa-futbol">fas fa-futbol</option>
                                <option value="fas fa-gamepad">fas fa-gamepad</option>
                                <option value="fas fa-gavel">fas fa-gavel</option>
                                <option value="fas fa-gbp">fas fa-gbp</option>
                                <option value="fas fa-ge">fas fa-ge</option>
                                <option value="fas fa-gear">fas fa-gear</option>
                                <option value="fas fa-gears">fas fa-gears</option>
                                <option value="fas fa-genderless">fas fa-genderless</option>
                                <option value="fas fa-get-pocket">fas fa-get-pocket</option>
                                <option value="fas fa-gg">fas fa-gg</option>
                                <option value="fas fa-gg-circle">fas fa-gg-circle</option>
                                <option value="fas fa-gift">fas fa-gift</option>
                                <option value="fas fa-git">fas fa-git</option>
                                <option value="fas fa-git-square">fas fa-git-square</option>
                                <option value="fas fa-github">fas fa-github</option>
                                <option value="fas fa-github-alt">fas fa-github-alt</option>
                                <option value="fas fa-github-square">fas fa-github-square</option>
                                <option value="fas fa-gittip">fas fa-gittip</option>
                                <option value="fas fa-glass">fas fa-glass</option>
                                <option value="fas fa-globe">fas fa-globe</option>
                                <option value="fas fa-google">fas fa-google</option>
                                <option value="fas fa-google-plus">fas fa-google-plus</option>
                                <option value="fas fa-google-plus-square">fas fa-google-plus-square</option>
                                <option value="fas fa-google-wallet">fas fa-google-wallet</option>
                                <option value="fas fa-graduation-cap">fas fa-graduation-cap</option>
                                <option value="fas fa-gratipay">fas fa-gratipay</option>
                                <option value="fas fa-group">fas fa-group</option>
                                <option value="fas fa-h-square">fas fa-h-square</option>
                                <option value="fas fa-hacker-news">fas fa-hacker-news</option>
                                <option value="fas fa-hand-grab">fas fa-hand-grab</option>
                                <option value="fas fa-hand-lizard">fas fa-hand-lizard</option>
                                <option value="fas fa-hand-down">fas fa-hand-down</option>
                                <option value="fas fa-hand-left">fas fa-hand-left</option>
                                <option value="fas fa-hand-right">fas fa-hand-right</option>
                                <option value="fas fa-hand-up">fas fa-hand-up</option>
                                <option value="fas fa-hand-paper">fas fa-hand-paper</option>
                                <option value="fas fa-hand-peace">fas fa-hand-peace</option>
                                <option value="fas fa-hand-pointer">fas fa-hand-pointer</option>
                                <option value="fas fa-hand-rock">fas fa-hand-rock</option>
                                <option value="fas fa-hand-scissors">fas fa-hand-scissors</option>
                                <option value="fas fa-hand-spock">fas fa-hand-spock</option>
                                <option value="fas fa-hand-stop">fas fa-hand-stop</option>
                                <option value="fas fa-hdd">fas fa-hdd</option>
                                <option value="fas fa-header">fas fa-header</option>
                                <option value="fas fa-headphones">fas fa-headphones</option>
                                <option value="fas fa-heart">fas fa-heart</option>
                                <option value="fas fa-heart">fas fa-heart</option>
                                <option value="fas fa-heartbeat">fas fa-heartbeat</option>
                                <option value="fas fa-history">fas fa-history</option>
                                <option value="fas fa-home">fas fa-home</option>
                                <option value="fas fa-hospital">fas fa-hospital</option>
                                <option value="fas fa-hotel">fas fa-hotel</option>
                                <option value="fas fa-hourglass">fas fa-hourglass</option>
                                <option value="fas fa-hourglass-1">fas fa-hourglass-1</option>
                                <option value="fas fa-hourglass-2">fas fa-hourglass-2</option>
                                <option value="fas fa-hourglass-3">fas fa-hourglass-3</option>
                                <option value="fas fa-hourglass-end">fas fa-hourglass-end</option>
                                <option value="fas fa-hourglass-half">fas fa-hourglass-half</option>
                                <option value="fas fa-hourglass">fas fa-hourglass</option>
                                <option value="fas fa-hourglass-start">fas fa-hourglass-start</option>
                                <option value="fas fa-houzz">fas fa-houzz</option>
                                <option value="fas fa-html5">fas fa-html5</option>
                                <option value="fas fa-i-cursor">fas fa-i-cursor</option>
                                <option value="fas fa-ils">fas fa-ils</option>
                                <option value="fas fa-image">fas fa-image</option>
                                <option value="fas fa-inbox">fas fa-inbox</option>
                                <option value="fas fa-indent">fas fa-indent</option>
                                <option value="fas fa-industry">fas fa-industry</option>
                                <option value="fas fa-info">fas fa-info</option>
                                <option value="fas fa-infcircle">fas fa-infcircle</option>
                                <option value="fas fa-inr">fas fa-inr</option>
                                <option value="fas fa-instagram">fas fa-instagram</option>
                                <option value="fas fa-institution">fas fa-institution</option>
                                <option value="fas fa-internet-explorer">fas fa-internet-explorer</option>
                                <option value="fas fa-intersex">fas fa-intersex</option>
                                <option value="fas fa-ioxhost">fas fa-ioxhost</option>
                                <option value="fas fa-italic">fas fa-italic</option>
                                <option value="fas fa-joomla">fas fa-joomla</option>
                                <option value="fas fa-jpy">fas fa-jpy</option>
                                <option value="fas fa-jsfiddle">fas fa-jsfiddle</option>
                                <option value="fas fa-key">fas fa-key</option>
                                <option value="fas fa-keyboard">fas fa-keyboard</option>
                                <option value="fas fa-krw">fas fa-krw</option>
                                <option value="fas fa-language">fas fa-language</option>
                                <option value="fas fa-laptop">fas fa-laptop</option>
                                <option value="fas fa-lastfm">fas fa-lastfm</option>
                                <option value="fas fa-lastfm-square">fas fa-lastfm-square</option>
                                <option value="fas fa-leaf">fas fa-leaf</option>
                                <option value="fas fa-leanpub">fas fa-leanpub</option>
                                <option value="fas fa-legal">fas fa-legal</option>
                                <option value="fas fa-lemon">fas fa-lemon</option>
                                <option value="fas fa-level-down">fas fa-level-down</option>
                                <option value="fas fa-level-up">fas fa-level-up</option>
                                <option value="fas fa-life-bouy">fas fa-life-bouy</option>
                                <option value="fas fa-life-buoy">fas fa-life-buoy</option>
                                <option value="fas fa-life-ring">fas fa-life-ring</option>
                                <option value="fas fa-life-saver">fas fa-life-saver</option>
                                <option value="fas fa-lightbulb">fas fa-lightbulb</option>
                                <option value="fas fa-line-chart">fas fa-line-chart</option>
                                <option value="fas fa-link">fas fa-link</option>
                                <option value="fas fa-linkedin">fas fa-linkedin</option>
                                <option value="fas fa-linkedin-square">fas fa-linkedin-square</option>
                                <option value="fas fa-linux">fas fa-linux</option>
                                <option value="fas fa-list">fas fa-list</option>
                                <option value="fas fa-list-alt">fas fa-list-alt</option>
                                <option value="fas fa-listl">fas fa-listl</option>
                                <option value="fas fa-list-ul">fas fa-list-ul</option>
                                <option value="fas fa-location-arrow">fas fa-location-arrow</option>
                                <option value="fas fa-lock">fas fa-lock</option>
                                <option value="fas fa-long-arrow-down">fas fa-long-arrow-down</option>
                                <option value="fas fa-long-arrow-left">fas fa-long-arrow-left</option>
                                <option value="fas fa-long-arrow-right">fas fa-long-arrow-right</option>
                                <option value="fas fa-long-arrow-up">fas fa-long-arrow-up</option>
                                <option value="fas fa-magic">fas fa-magic</option>
                                <option value="fas fa-magnet">fas fa-magnet</option>

                                <option value="fas fa-mars-stroke-v">fas fa-mars-stroke-v</option>
                                <option value="fas fa-maxcdn">fas fa-maxcdn</option>
                                <option value="fas fa-meanpath">fas fa-meanpath</option>
                                <option value="fas fa-medium">fas fa-medium</option>
                                <option value="fas fa-medkit">fa; fas fa-medkit</option>
                                <option value="fas fa-meh">fas fa-meh</option>
                                <option value="fas fa-mercury">fas fa-mercury</option>
                                <option value="fas fa-microphone">fas fa-microphone</option>
                                <option value="fas fa-mobile">fas fa-mobile</option>
                                <option value="fas fa-motorcycle">fas fa-motorcycle</option>
                                <option value="fas fa-mouse-pointer">fas fa-mouse-pointer</option>
                                <option value="fas fa-music">fas fa-music</option>
                                <option value="fas fa-navicon">fas fa-navicon</option>
                                <option value="fas fa-neuter">fas fa-neuter</option>
                                <option value="fas fa-newspaper">fas fa-newspaper</option>
                                <option value="fas fapencart">fas fapencart</option>
                                <option value="fas fapenid">fas fapenid</option>
                                <option value="fas fapera">fas fapera</option>
                                <option value="fas fautdent">fas fautdent</option>
                                <option value="fas fa-pagelines">fas fa-pagelines</option>
                                <option value="fas fa-paper-plane">fas fa-paper-plane</option>
                                <option value="fas fa-paperclip">fas fa-paperclip</option>
                                <option value="fas fa-paragraph">fas fa-paragraph</option>
                                <option value="fas fa-paste">fas fa-paste</option>
                                <option value="fas fa-pause">fas fa-pause</option>
                                <option value="fas fa-paw">fas fa-paw</option>
                                <option value="fas fa-paypal">fas fa-paypal</option>
                                <option value="fas fa-pencil">fas fa-pencil</option>
                                <option value="fas fa-pencil-square">fas fa-pencil-square</option>
                                <option value="fas fa-phone">fas fa-phone</option>
                                <option value="fas fa-photo">fas fa-photo</option>
                                <option value="fas fa-picture">fas fa-picture</option>
                                <option value="fas fa-pie-chart">fas fa-pie-chart</option>
                                <option value="fas fa-pied-piper">fas fa-pied-piper</option>
                                <option value="fas fa-pied-piper-alt">fas fa-pied-piper-alt</option>
                                <option value="fas fa-pinterest">fas fa-pinterest</option>
                                <option value="fas fa-pinterest-p">fas fa-pinterest-p</option>
                                <option value="fas fa-pinterest-square">fas fa-pinterest-square</option>
                                <option value="fas fa-plane">fas fa-plane</option>
                                <option value="fas fa-play">fas fa-play</option>
                                <option value="fas fa-play-circle">fas fa-play-circle</option>
                                <option value="fas fa-play-circle">fas fa-play-circle</option>
                                <option value="fas fa-plug">fas fa-plug</option>
                                <option value="fas fa-plus">fas fa-plus</option>
                                <option value="fas fa-plus-circle">fas fa-plus-circle</option>
                                <option value="fas fa-plus-square">fas fa-plus-square</option>
                                <option value="fas fa-plus-square">fas fa-plus-square</option>
                                <option value="fas fa-powerff">fas fa-powerff</option>
                                <option value="fas fa-print">fas fa-print</option>
                                <option value="fas fa-puzzle-piece">fas fa-puzzle-piece</option>
                                <option value="fas fa-qq">fas fa-qq</option>
                                <option value="fas fa-qrcode">fas fa-qrcode</option>
                                <option value="fas fa-question">fas fa-question</option>
                                <option value="fas fa-question-circle">fas fa-question-circle</option>
                                <option value="fas fa-quote-left">fas fa-quote-left</option>
                                <option value="fas fa-quote-right">fas fa-quote-right</option>
                                <option value="fas fa-ra">fas fa-ra</option>
                                <option value="fas fa-random">fas fa-random</option>
                                <option value="fas fa-rebel">fas fa-rebel</option>
                                <option value="fas fa-recycle">fas fa-recycle</option>
                                <option value="fas fa-reddit">fas fa-reddit</option>
                                <option value="fas fa-reddit-square">fas fa-reddit-square</option>
                                <option value="fas fa-refresh">fas fa-refresh</option>
                                <option value="fas fa-registered">fas fa-registered</option>
                                <option value="fas fa-remove">fas fa-remove</option>
                                <option value="fas fa-renren">fas fa-renren</option>
                                <option value="fas fa-reorder">fas fa-reorder</option>
                                <option value="fas fa-repeat">fas fa-repeat</option>
                                <option value="fas fa-reply">fas fa-reply</option>
                                <option value="fas fa-reply-all">fas fa-reply-all</option>
                                <option value="fas fa-retweet">fas fa-retweet</option>
                                <option value="fas fa-rmb">fas fa-rmb</option>
                                <option value="fas fa-road">fas fa-road</option>
                                <option value="fas fa-rocket">fas fa-rocket</option>
                                <option value="fas fa-rotate-left">fas fa-rotate-left</option>
                                <option value="fas fa-rotate-right">fas fa-rotate-right</option>
                                <option value="fas fa-rouble">fas fa-rouble</option>
                                <option value="fas fa-rss">fas fa-rss</option>
                                <option value="fas fa-rss-square">fas fa-rss-square</option>
                                <option value="fas fa-rub">fas fa-rub</option>
                                <option value="fas fa-ruble">fas fa-ruble</option>
                                <option value="fas fa-rupee">fas fa-rupee</option>
                                <option value="fas fa-safas fari">fas fa-safas fari</option>
                                <option value="fas fa-sliders">fas fa-sliders</option>
                                <option value="fas fa-slideshare">fas fa-slideshare</option>
                                <option value="fas fa-smile">fas fa-smile</option>
                                <option value="fas fa-sort-asc">fas fa-sort-asc</option>
                                <option value="fas fa-sort-desc">fas fa-sort-desc</option>
                                <option value="fas fa-sort-down">fas fa-sort-down</option>
                                <option value="fas fa-spinner">fas fa-spinner</option>
                                <option value="fas fa-spoon">fas fa-spoon</option>
                                <option value="fas fa-spotify">fas fa-spotify</option>
                                <option value="fas fa-square">fas fa-square</option>
                                <option value="fas fa-square">fas fa-square</option>
                                <option value="fas fa-star">fas fa-star</option>
                                <option value="fas fa-star-half">fas fa-star-half</option>
                                <option value="fas fa-stop">fas fa-stop</option>
                                <option value="fas fa-subscript">fas fa-subscript</option>
                                <option value="fas fa-tablet">fas fa-tablet</option>
                                <option value="fas fa-tachometer">fas fa-tachometer</option>
                                <option value="fas fa-tag">fas fa-tag</option>
                                <option value="fas fa-tags">fas fa-tags</option>
                            </select>
                            @error('icon')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="deadline-form">
                            <div class="row g-3 mb-3">
                                <div class="col">
                                    <label for="datepickerded" class="form-label">Date de début du projet</label>
                                    <input type="date"
                                        class="form-control @error('date_debut') is-invalid @enderror"
                                        id="datepickerded" name="date_debut" value="{{ old('date_debut') ?? '' }}">
                                    @error('date_debut')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="datepickerdedone" class="form-label">Date de fin du projet</label>
                                    <input type="date" class="form-control @error('date_fin') is-invalid @enderror"
                                        id="datepickerdedone" name="date_fin" value="{{ old('date_fin') ?? '' }}">
                                    @error('date_fin')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-3 mb-3">
                                {{-- <div class="col-sm-12">
                                    <label class="form-label">Notification envoyée</label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="notification">
                                        <option selected>Tous</option>
                                        <option value="1">Chef d'équipe uniquement</option>
                                        <option value="2">Membre de l'équipe uniquement</option>
                                    </select>
                                </div> --}}
                                <div class="col-sm-12">
                                    <label for="formFileMultipleone" class="form-label">Personne affectée à la
                                        tâche</label>
                                    <select name="users[]" class="form-select @error('users[]') is-invalid @enderror"
                                        multiple aria-label="Default select Priority">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == old('users[]') ? 'selected' : '' }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('users[]')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Budget</label>
                                <input type="number" class="form-control @error('budjet') is-invalid @enderror"
                                    name="budjet" value="{{ old('budjet') ?? '' }}">
                                @error('budjet')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm">
                                <label for="formFileMultipleone" class="form-label">Priorité</label>
                                <select class="form-select @error('priority') is-invalid @enderror"
                                    aria-label="Default select Priority" name="priority">
                                    <option value="élevé" {{ old('priority') == 'élevé' ? 'selected' : '' }}>
                                        Supérieure</option>
                                    <option value="Moyenne" {{ old('priority') == 'Moyenne' ? 'selected' : '' }}>
                                        Moyenne</option>
                                    <option value="faible" {{ old('priority') == 'faible' ? 'selected' : '' }}>Faible
                                    </option>
                                    <option value="bas" {{ old('priority') == 'bas' ? 'selected' : '' }}>Le plus
                                        bas</option>
                                </select>
                                @error('priority')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea78"
                                class="form-label @error('description') is-invalid @enderror">Description
                                (facultatif)</label>
                            <textarea class="form-control" id="exampleFormControlTextarea78" rows="3"
                                placeholder="Add any extra details about the request" name="description">{{ old('description') ?? '' }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Project-->
@foreach ($projects as $project)
    <div class="modal fade" id="editproject{{ $project->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('projects.update', $project) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title  fw-bold" id="editprojectLabel"> Editer le projet</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleFormControlInput78" class="form-label">Nom du projet</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror"
                                    id="exampleFormControlInput78" value="{{ $project->nom }}" name="nom">
                                @error('nom')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label @error('category') is-invalid @enderror">Catégorie de
                                    projet</label>
                                <select class="form-select @error('category') is-invalid @enderror"
                                    aria-label="Default select Project Category" name="category">
                                    <option value="UI/UX Design"
                                        {{ $project->category == 'UI/UX Design' ? 'selected' : '' }}>
                                        UI/UX Design</option>
                                    <option value="Website Design"
                                        {{ $project->category == 'Website Design' ? 'selected' : '' }}>
                                        Website Design</option>
                                    <option value="App Development"
                                        {{ $project->category == 'App Development' ? 'selected' : '' }}>
                                        App Development
                                    </option>
                                    <option value="Quality Assurance"
                                        {{ $project->category == 'Quality Assurance' ? 'selected' : '' }}>Quality
                                        Assurance
                                    </option>
                                    <option value="Development"
                                        {{ $project->category == 'Development' ? 'selected' : '' }}>
                                        Development</option>
                                    <option value="Backend Development"
                                        {{ $project->category == 'Backend Development' ? 'selected' : '' }}>Backend
                                        Development
                                    </option>
                                    <option value="Software Testing"
                                        {{ $project->category == 'Software Testing' ? 'selected' : '' }}>Software
                                        Testing
                                    </option>
                                    <option value="Website Design"
                                        {{ $project->category == 'Website Design' ? 'selected' : '' }}>
                                        Website Design</option>
                                    <option value="Marketing"
                                        {{ $project->category == 'Marketing' ? 'selected' : '' }}>
                                        Marketing</option>
                                    <option value="SEO" {{ $project->category == 'SEO' ? 'selected' : '' }}>SEO
                                    </option>
                                    <option value="Other" {{ $project->category == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                                @error('category')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple456"
                                    class="form-label @error('icon') is-invalid @enderror">Icon</label>
                                <select id="icon" class="form-select select2-icon" name="icon">
                                    <option value="" disabled selected>...</option>
                                    <option value="fas fa-align-left">fas fa-align-left</option>
                                    <option value="fas fa-align-right">fas fa-align-right</option>
                                    <option value="fab fa-amazon">fab fa-amazon</option>
                                    <option value="fas fa-ambulance">fas fa-ambulance</option>
                                    <option value="fas fa-anchor">fas fa-anchor</option>
                                    <option value="fab fa-android">fab fa-android</option>
                                    <option value="fab fa-angellist">fab fa-angellist</option>
                                    <option value="fas fa-angle-double-down">fas fa-angle-double-down</option>
                                    <option value="fas fa-angle-double-left">fas fa-angle-double-left</option>
                                    <option value="fas fa-angle-double-right">fas fa-angle-double-right</option>
                                    <option value="fas fa-angle-double-up">fas fa-angle-double-up</option>

                                    <option value="fas fa-angle-left">fas fa-angle-left</option>
                                    <option value="fas fa-angle-right">fas fa-angle-right</option>
                                    <option value="fas fa-angle-up">fas fa-angle-up</option>
                                    <option value="fab fa-apple">fab fa-apple</option>
                                    <option value="fas fa-archive">fas fa-archive</option>
                                    <option value="fas fa-arrow-circle-down">fas fa-arrow-circle-down</option>
                                    <option value="fas fa-arrow-circle-left">fas fa-arrow-circle-left</option>
                                    <option value="fas fa-arrow-circle-down">fas fa-arrow-circle-down</option>
                                    <option value="fas fa-arrow-circle-left">fas fa-arrow-circle-left</option>
                                    <option value="fas fa-arrow-circle-right">fas fa-arrow-circle-right</option>
                                    <option value="fas fa-arrow-circle-up">fas fa-arrow-circle-up</option>
                                    <option value="fas fa-arrow-circle-right">fas fa-arrow-circle-right</option>
                                    <option value="fas fa-arrow-circle-up">fas fa-arrow-circle-up</option>
                                    <option value="fas fa-arrow-down">fas fa-arrow-down</option>
                                    <option value="fas fa-arrow-left">fas fa-arrow-left</option>
                                    <option value="fas fa-arrow-right">fas fa-arrow-right</option>
                                    <option value="fas fa-arrow-up">fas fa-arrow-up</option>
                                    <option value="fas fa-people-arrows">fas fa-people-arrows</option>
                                    <option value="fas fa-arrows-alt">fas fa-arrows-alt</option>
                                    <option value="fas fa-arrows-alt-h">fas fa-arrows-alt-h</option>
                                    <option value="fas fa-arrows-alt-v">fas fa-arrows-alt-v</option>
                                    <option value="fas fa-asterisk">fas fa-asterisk</option>
                                    <option value="fas fa-at">fas fas fa-at</option>
                                    <option value="fas fa-bus-alt">fas fa-bus-alt</option>
                                    <option value="fas fa-backward">fas fa-backward</option>
                                    <option value="fas fa-balance-scale">fas fa-balance-scale</option>
                                    <option value="fas fa-ban">fas fa-ban</option>
                                    <option value="fas fa-chart-bar">fas fa-chart-bar</option>
                                    <option value="far fa-chart-bar">far fa-chart-bar</option>

                                    <option value="fas fa-battery-full">fas fa-battery-full</option>
                                    <option value="fas fa-beer">fas fa-beer</option>
                                    <option value="far fa-bell">far fa-bell</option>
                                    <option value="fas fa-bell">fas fa-bell</option>
                                    <option value="fas fa-bell-slash">fas fa-bell-slash</option>
                                    <option value="far fa-bell-slash">far fa-bell-slash</option>
                                    <option value="fas fa-bicycle">fas fa-bicycle</option>
                                    <option value="fas fa-binoculars">fas fa-binoculars</option>
                                    <option value="fas fa-birthday-cake">fas fa-birthday-cake</option>
                                    <option value="fab fa-bitcoin">fab fa-bitcoin</option>
                                    <option value="fab fa-black-tie">fab fa-black-tie</option>
                                    <option value="fas fa-bold">fas fa-bold</option>
                                    <option value="fas fa-bolt">fas fa-bolt</option>
                                    <option value="fas fa-bomb">fas fa-bomb</option>
                                    <option value="fas fa-book">fas fa-book</option>
                                    <option value="fas fa-bookmark">fas fa-bookmark</option>
                                    <option value="fas fa-bookmark">fas fa-bookmark</option>
                                    <option value="fas fa-briefcase">fas fa-briefcase</option>
                                    <option value="fas fa-bug">fas fa-bug</option>
                                    <option value="fas fa-building">fas fa-building</option>
                                    <option value="far fa-building">far fa-building</option>
                                    <option value="fas fa-bullhorn">fas fa-bullhorn</option>
                                    <option value="fas fa-bullseye">fas fa-bullseye</option>
                                    <option value="fas fa-bus">fas fa-bus</option>
                                    <option value="fas fa-calendar">fas fa-calendar</option>
                                    <option value="fas fa-camera">fas fa-camera</option>
                                    <option value="fas fa-car">fas fa-car</option>
                                    <option value="fas fa-caret-up">fas fa-caret-up</option>
                                    <option value="fas fa-cart-plus">fas fa-cart-plus</option>
                                    <option value="fab fa-cc-amex">fab fa-cc-amex</option>
                                    <option value="fab fa-cc-jcb">fab fa-cc-jcb</option>
                                    <option value="fab fa-cc-paypal">fab fa-cc-paypal</option>
                                    <option value="fab fa-cc-stripe">fab fa-cc-stripe</option>
                                    <option value="fab fa-cc-visa">fab fa-cc-visa</option>
                                    <option value="fas fa-check">fas fa-check</option>
                                    <option value="fas fa-chevron-left">fas fa-chevron-left</option>
                                    <option value="fas fa-chevron-right">fas fa-chevron-right</option>
                                    <option value="fas fa-chevron-up">fas fa-chevron-up</option>
                                    <option value="fas fa-child">fas fa-child</option>
                                    <option value="fab fa-chrome">fab fa-chrome</option>
                                    <option value="fas fa-circle">fas fa-circle</option>
                                    <option value="far fa-circle">far fa-circle</option>
                                    <option value="fas fa-circle-notch">fas fa-circle-notch</option>
                                    <option value="fas fa-smile-wink">fas fa-smile-wink</option>
                                    <option value="fas fa-clipboard">fas fa-clipboard</option>
                                    <option value="fas fa-clock">fas fa-clock</option>
                                    <option value="fas fa-clone">fas fa-clone</option>
                                    <option value="far fa-times-circle">far fa-times-circle</option>
                                    <option value="fas fa-cloud">fas fa-cloud</option>
                                    <option value="fas fa-cloud-download-alt">fas fa-cloud-download-alt</option>
                                    <option value="fas fa-cloud-upload-alt">fas fa-cloud-upload</option>
                                    <option value="fas fa-code">fas fa-code</option>
                                    <option value="fas fa-code-branch">fas fa-code-branch</option>
                                    <option value="fab fa-codepen">fab fa-codepen</option>
                                    <option value="fas fa-coffee">fas fa-coffee</option>
                                    <option value="fas fa-cog">fas fa-cog</option>
                                    <option value="fas fa-cogs">fas fa-cogs</option>
                                    <option value="fas fa-columns">fas fa-columns</option>
                                    <option value="fas fa-comment">fas fa-comment</option>
                                    <option value="far fa-comment">far fa-comment</option>
                                    <option value="fas fa-comment-dots">fas fa-comment-dots</option>
                                    <option value="fas fa-comment-dollar">fas fa-comment-dollar</option>
                                    <option value="fas fa-comments">fas fa-comments</option>
                                    <option value="fas fa-comments-dollar">fas fa-comments-dollar</option>
                                    <option value="fas fa-compass">fas fa-compass</option>
                                    <option value="fas fa-compress">fas fa-compress</option>
                                    <option value="fas fa-copy">fas fa-copy</option>
                                    <option value="fas fa-copyright">fas fa-copyright</option>
                                    <option value="fab fa-creative-commons">fab fa-creative-commons</option>
                                    <option value="fas fa-credit-card">fas fa-credit-card</option>
                                    <option value="fas fa-crop">fas fa-crop</option>
                                    <option value="fas fa-crosshairs">fas fa-crosshairs</option>
                                    <option value="fas fa-cube">fas fa-cube</option>
                                    <option value="fas fa-cubes">fas fa-cubes</option>
                                    <option value="fas fa-cut">fas fa-cut</option>
                                    <option value="fas fa-database">fas fa-database</option>
                                    <option value="fab fa-delicious">fab fa-delicious</option>
                                    <option value="fas fa-desktop">fas fa-desktop</option>
                                    <option value="fas fa-dollar-sign">fas fa-dollar-sign</option>
                                    <option value="fas fa-download">fas fa-download</option>
                                    <option value="fas fa-dribbble">fas fa-dribbble</option>
                                    <option value="fas fa-dropbox">fas fa-dropbox</option>
                                    <option value="fas fa-drupal">fas fa-drupal</option>
                                    <option value="fas fa-edit">fas fa-edit</option>
                                    <option value="fas fa-eject">fas fa-eject</option>
                                    <option value="fas fa-ellipsis-h">fas fa-ellipsis-h</option>
                                    <option value="fas fa-ellipsis-v">fas fa-ellipsis-v</option>
                                    <option value="fas fa-empire">fas fa-empire</option>
                                    <option value="fas fa-envelope">fas fa-envelope</option>
                                    <option value="fas fa-envelope">fas fa-envelope</option>
                                    <option value="fas fa-eur">fas fa-eur</option>
                                    <option value="fas fa-euro">fas fa-euro</option>
                                    <option value="fas fa-exchange">fas fa-exchange</option>
                                    <option value="fas fa-exclamation">fas fa-exclamation</option>
                                    <option value="fas fa-exclamation-circle">fas fa-exclamation-circle</option>
                                    <option value="fas fa-exclamation-triangle">fas fa-exclamation-triangle</option>
                                    <option value="fas fa-expand">fas fa-expand</option>
                                    <option value="fas fa-expeditedssl">fas fa-expeditedssl</option>
                                    <option value="fas fa-external-link">fas fa-external-link</option>
                                    <option value="fas fa-external-link-square">fas fa-external-link-square</option>
                                    <option value="fas fa-eye">fas fa-eye</option>
                                    <option value="fas fa-eye-slash">fas fa-eye-slash</option>
                                    <option value="fas fa-eyedropper">fas fa-eyedropper</option>
                                    <option value="fas fa-fas facebook">fas fa-fas facebook</option>
                                    <option value="fas fa-fas facebook-f">fas fa-fas facebook-f</option>
                                    <option value="fas fa-fas facebookfficial">fas fa-fas facebookfficial</option>
                                    <option value="fas fa-fas facebook-square">fas fa-fas facebook-square</option>
                                    <option value="fas fa-fas fast-backward">fas fa-fas fast-backward</option>
                                    <option value="fas fa-fas fast-forward">fas fa-fas fast-forward</option>
                                    <option value="fas fa-fas fax">fas fa-fas fax</option>
                                    <option value="fas fa-feed">fas fa-feed</option>
                                    <option value="fas fa-female">fas fa-female</option>
                                    <option value="fas fa-fighter-jet">fas fa-fighter-jet</option>
                                    <option value="fas fa-file">fas fa-file</option>
                                    <option value="fas fa-file-archive">fas fa-file-archive</option>
                                    <option value="fas fa-file-audio">fas fa-file-audio</option>
                                    <option value="fas fa-file-code">fas fa-file-code</option>
                                    <option value="fas fa-file-excel">fas fa-file-excel</option>
                                    <option value="fas fa-file-image">fas fa-file-image</option>
                                    <option value="fas fa-file-movie">fas fa-file-movie</option>
                                    <option value="fas fa-file">fas fa-file</option>
                                    <option value="fas fa-file-pdf">fas fa-file-pdf</option>
                                    <option value="fas fa-file-photo">fas fa-file-photo</option>
                                    <option value="fas fa-file-picture">fas fa-file-picture</option>
                                    <option value="fas fa-file-powerpoint">fas fa-file-powerpoint</option>
                                    <option value="fas fa-file-sound">fas fa-file-sound</option>
                                    <option value="fas fa-file-text">fas fa-file-text</option>
                                    <option value="fas fa-file-text">fas fa-file-text</option>
                                    <option value="fas fa-file-video">fas fa-file-video</option>
                                    <option value="fas fa-file-word">fas fa-file-word</option>
                                    <option value="fas fa-file-zip">fas fa-file-zip</option>
                                    <option value="fas fa-files">fas fa-files</option>
                                    <option value="fas fa-film">fas fa-film</option>
                                    <option value="fas fa-filter">fas fa-filter</option>
                                    <option value="fas fa-fire">fas fa-fire</option>
                                    <option value="fas fa-fire-extinguisher">fas fa-fire-extinguisher</option>
                                    <option value="fas fa-firefox">fas fa-firefox</option>
                                    <option value="fas fa-flag">fas fa-flag</option>
                                    <option value="fas fa-flag-checkered">fas fa-flag-checkered</option>
                                    <option value="fas fa-flag">fas fa-flag</option>
                                    <option value="fas fa-flash">fas fa-flash</option>
                                    <option value="fas fa-flask">fas fa-flask</option>
                                    <option value="fas fa-flickr">fas fa-flickr</option>
                                    <option value="fas fa-floppy">fas fa-floppy</option>
                                    <option value="fas fa-folder">fas fa-folder</option>
                                    <option value="fas fa-folder">fas fa-folder</option>
                                    <option value="fas fa-folderpen">fas fa-folderpen</option>
                                    <option value="fas fa-folderpen">fas fa-folderpen</option>
                                    <option value="fas fa-font">fas fa-font</option>
                                    <option value="fas fa-fonticons">fas fa-fonticons</option>
                                    <option value="fas fa-forumbee">fas fa-forumbee</option>
                                    <option value="fas fa-forward">fas fa-forward</option>
                                    <option value="fas fa-foursquare">fas fa-foursquare</option>
                                    <option value="fas fa-frown">fas fa-frown</option>
                                    <option value="fas fa-futbol">fas fa-futbol</option>
                                    <option value="fas fa-gamepad">fas fa-gamepad</option>
                                    <option value="fas fa-gavel">fas fa-gavel</option>
                                    <option value="fas fa-gbp">fas fa-gbp</option>
                                    <option value="fas fa-ge">fas fa-ge</option>
                                    <option value="fas fa-gear">fas fa-gear</option>
                                    <option value="fas fa-gears">fas fa-gears</option>
                                    <option value="fas fa-genderless">fas fa-genderless</option>
                                    <option value="fas fa-get-pocket">fas fa-get-pocket</option>
                                    <option value="fas fa-gg">fas fa-gg</option>
                                    <option value="fas fa-gg-circle">fas fa-gg-circle</option>
                                    <option value="fas fa-gift">fas fa-gift</option>
                                    <option value="fas fa-git">fas fa-git</option>
                                    <option value="fas fa-git-square">fas fa-git-square</option>
                                    <option value="fas fa-github">fas fa-github</option>
                                    <option value="fas fa-github-alt">fas fa-github-alt</option>
                                    <option value="fas fa-github-square">fas fa-github-square</option>
                                    <option value="fas fa-gittip">fas fa-gittip</option>
                                    <option value="fas fa-glass">fas fa-glass</option>
                                    <option value="fas fa-globe">fas fa-globe</option>
                                    <option value="fas fa-google">fas fa-google</option>
                                    <option value="fas fa-google-plus">fas fa-google-plus</option>
                                    <option value="fas fa-google-plus-square">fas fa-google-plus-square</option>
                                    <option value="fas fa-google-wallet">fas fa-google-wallet</option>
                                    <option value="fas fa-graduation-cap">fas fa-graduation-cap</option>
                                    <option value="fas fa-gratipay">fas fa-gratipay</option>
                                    <option value="fas fa-group">fas fa-group</option>
                                    <option value="fas fa-h-square">fas fa-h-square</option>
                                    <option value="fas fa-hacker-news">fas fa-hacker-news</option>
                                    <option value="fas fa-hand-grab">fas fa-hand-grab</option>
                                    <option value="fas fa-hand-lizard">fas fa-hand-lizard</option>
                                    <option value="fas fa-hand-down">fas fa-hand-down</option>
                                    <option value="fas fa-hand-left">fas fa-hand-left</option>
                                    <option value="fas fa-hand-right">fas fa-hand-right</option>
                                    <option value="fas fa-hand-up">fas fa-hand-up</option>
                                    <option value="fas fa-hand-paper">fas fa-hand-paper</option>
                                    <option value="fas fa-hand-peace">fas fa-hand-peace</option>
                                    <option value="fas fa-hand-pointer">fas fa-hand-pointer</option>
                                    <option value="fas fa-hand-rock">fas fa-hand-rock</option>
                                    <option value="fas fa-hand-scissors">fas fa-hand-scissors</option>
                                    <option value="fas fa-hand-spock">fas fa-hand-spock</option>
                                    <option value="fas fa-hand-stop">fas fa-hand-stop</option>
                                    <option value="fas fa-hdd">fas fa-hdd</option>
                                    <option value="fas fa-header">fas fa-header</option>
                                    <option value="fas fa-headphones">fas fa-headphones</option>
                                    <option value="fas fa-heart">fas fa-heart</option>
                                    <option value="fas fa-heart">fas fa-heart</option>
                                    <option value="fas fa-heartbeat">fas fa-heartbeat</option>
                                    <option value="fas fa-history">fas fa-history</option>
                                    <option value="fas fa-home">fas fa-home</option>
                                    <option value="fas fa-hospital">fas fa-hospital</option>
                                    <option value="fas fa-hotel">fas fa-hotel</option>
                                    <option value="fas fa-hourglass">fas fa-hourglass</option>
                                    <option value="fas fa-hourglass-1">fas fa-hourglass-1</option>
                                    <option value="fas fa-hourglass-2">fas fa-hourglass-2</option>
                                    <option value="fas fa-hourglass-3">fas fa-hourglass-3</option>
                                    <option value="fas fa-hourglass-end">fas fa-hourglass-end</option>
                                    <option value="fas fa-hourglass-half">fas fa-hourglass-half</option>
                                    <option value="fas fa-hourglass">fas fa-hourglass</option>
                                    <option value="fas fa-hourglass-start">fas fa-hourglass-start</option>
                                    <option value="fas fa-houzz">fas fa-houzz</option>
                                    <option value="fas fa-html5">fas fa-html5</option>
                                    <option value="fas fa-i-cursor">fas fa-i-cursor</option>
                                    <option value="fas fa-ils">fas fa-ils</option>
                                    <option value="fas fa-image">fas fa-image</option>
                                    <option value="fas fa-inbox">fas fa-inbox</option>
                                    <option value="fas fa-indent">fas fa-indent</option>
                                    <option value="fas fa-industry">fas fa-industry</option>
                                    <option value="fas fa-info">fas fa-info</option>
                                    <option value="fas fa-infcircle">fas fa-infcircle</option>
                                    <option value="fas fa-inr">fas fa-inr</option>
                                    <option value="fas fa-instagram">fas fa-instagram</option>
                                    <option value="fas fa-institution">fas fa-institution</option>
                                    <option value="fas fa-internet-explorer">fas fa-internet-explorer</option>
                                    <option value="fas fa-intersex">fas fa-intersex</option>
                                    <option value="fas fa-ioxhost">fas fa-ioxhost</option>
                                    <option value="fas fa-italic">fas fa-italic</option>
                                    <option value="fas fa-joomla">fas fa-joomla</option>
                                    <option value="fas fa-jpy">fas fa-jpy</option>
                                    <option value="fas fa-jsfiddle">fas fa-jsfiddle</option>
                                    <option value="fas fa-key">fas fa-key</option>
                                    <option value="fas fa-keyboard">fas fa-keyboard</option>
                                    <option value="fas fa-krw">fas fa-krw</option>
                                    <option value="fas fa-language">fas fa-language</option>
                                    <option value="fas fa-laptop">fas fa-laptop</option>
                                    <option value="fas fa-lastfm">fas fa-lastfm</option>
                                    <option value="fas fa-lastfm-square">fas fa-lastfm-square</option>
                                    <option value="fas fa-leaf">fas fa-leaf</option>
                                    <option value="fas fa-leanpub">fas fa-leanpub</option>
                                    <option value="fas fa-legal">fas fa-legal</option>
                                    <option value="fas fa-lemon">fas fa-lemon</option>
                                    <option value="fas fa-level-down">fas fa-level-down</option>
                                    <option value="fas fa-level-up">fas fa-level-up</option>
                                    <option value="fas fa-life-bouy">fas fa-life-bouy</option>
                                    <option value="fas fa-life-buoy">fas fa-life-buoy</option>
                                    <option value="fas fa-life-ring">fas fa-life-ring</option>
                                    <option value="fas fa-life-saver">fas fa-life-saver</option>
                                    <option value="fas fa-lightbulb">fas fa-lightbulb</option>
                                    <option value="fas fa-line-chart">fas fa-line-chart</option>
                                    <option value="fas fa-link">fas fa-link</option>
                                    <option value="fas fa-linkedin">fas fa-linkedin</option>
                                    <option value="fas fa-linkedin-square">fas fa-linkedin-square</option>
                                    <option value="fas fa-linux">fas fa-linux</option>
                                    <option value="fas fa-list">fas fa-list</option>
                                    <option value="fas fa-list-alt">fas fa-list-alt</option>
                                    <option value="fas fa-listl">fas fa-listl</option>
                                    <option value="fas fa-list-ul">fas fa-list-ul</option>
                                    <option value="fas fa-location-arrow">fas fa-location-arrow</option>
                                    <option value="fas fa-lock">fas fa-lock</option>
                                    <option value="fas fa-long-arrow-down">fas fa-long-arrow-down</option>
                                    <option value="fas fa-long-arrow-left">fas fa-long-arrow-left</option>
                                    <option value="fas fa-long-arrow-right">fas fa-long-arrow-right</option>
                                    <option value="fas fa-long-arrow-up">fas fa-long-arrow-up</option>
                                    <option value="fas fa-magic">fas fa-magic</option>
                                    <option value="fas fa-magnet">fas fa-magnet</option>

                                    <option value="fas fa-mars-stroke-v">fas fa-mars-stroke-v</option>
                                    <option value="fas fa-maxcdn">fas fa-maxcdn</option>
                                    <option value="fas fa-meanpath">fas fa-meanpath</option>
                                    <option value="fas fa-medium">fas fa-medium</option>
                                    <option value="fas fa-medkit">fa; fas fa-medkit</option>
                                    <option value="fas fa-meh">fas fa-meh</option>
                                    <option value="fas fa-mercury">fas fa-mercury</option>
                                    <option value="fas fa-microphone">fas fa-microphone</option>
                                    <option value="fas fa-mobile">fas fa-mobile</option>
                                    <option value="fas fa-motorcycle">fas fa-motorcycle</option>
                                    <option value="fas fa-mouse-pointer">fas fa-mouse-pointer</option>
                                    <option value="fas fa-music">fas fa-music</option>
                                    <option value="fas fa-navicon">fas fa-navicon</option>
                                    <option value="fas fa-neuter">fas fa-neuter</option>
                                    <option value="fas fa-newspaper">fas fa-newspaper</option>
                                    <option value="fas fapencart">fas fapencart</option>
                                    <option value="fas fapenid">fas fapenid</option>
                                    <option value="fas fapera">fas fapera</option>
                                    <option value="fas fautdent">fas fautdent</option>
                                    <option value="fas fa-pagelines">fas fa-pagelines</option>
                                    <option value="fas fa-paper-plane">fas fa-paper-plane</option>
                                    <option value="fas fa-paperclip">fas fa-paperclip</option>
                                    <option value="fas fa-paragraph">fas fa-paragraph</option>
                                    <option value="fas fa-paste">fas fa-paste</option>
                                    <option value="fas fa-pause">fas fa-pause</option>
                                    <option value="fas fa-paw">fas fa-paw</option>
                                    <option value="fas fa-paypal">fas fa-paypal</option>
                                    <option value="fas fa-pencil">fas fa-pencil</option>
                                    <option value="fas fa-pencil-square">fas fa-pencil-square</option>
                                    <option value="fas fa-phone">fas fa-phone</option>
                                    <option value="fas fa-photo">fas fa-photo</option>
                                    <option value="fas fa-picture">fas fa-picture</option>
                                    <option value="fas fa-pie-chart">fas fa-pie-chart</option>
                                    <option value="fas fa-pied-piper">fas fa-pied-piper</option>
                                    <option value="fas fa-pied-piper-alt">fas fa-pied-piper-alt</option>
                                    <option value="fas fa-pinterest">fas fa-pinterest</option>
                                    <option value="fas fa-pinterest-p">fas fa-pinterest-p</option>
                                    <option value="fas fa-pinterest-square">fas fa-pinterest-square</option>
                                    <option value="fas fa-plane">fas fa-plane</option>
                                    <option value="fas fa-play">fas fa-play</option>
                                    <option value="fas fa-play-circle">fas fa-play-circle</option>
                                    <option value="fas fa-play-circle">fas fa-play-circle</option>
                                    <option value="fas fa-plug">fas fa-plug</option>
                                    <option value="fas fa-plus">fas fa-plus</option>
                                    <option value="fas fa-plus-circle">fas fa-plus-circle</option>
                                    <option value="fas fa-plus-square">fas fa-plus-square</option>
                                    <option value="fas fa-plus-square">fas fa-plus-square</option>
                                    <option value="fas fa-powerff">fas fa-powerff</option>
                                    <option value="fas fa-print">fas fa-print</option>
                                    <option value="fas fa-puzzle-piece">fas fa-puzzle-piece</option>
                                    <option value="fas fa-qq">fas fa-qq</option>
                                    <option value="fas fa-qrcode">fas fa-qrcode</option>
                                    <option value="fas fa-question">fas fa-question</option>
                                    <option value="fas fa-question-circle">fas fa-question-circle</option>
                                    <option value="fas fa-quote-left">fas fa-quote-left</option>
                                    <option value="fas fa-quote-right">fas fa-quote-right</option>
                                    <option value="fas fa-ra">fas fa-ra</option>
                                    <option value="fas fa-random">fas fa-random</option>
                                    <option value="fas fa-rebel">fas fa-rebel</option>
                                    <option value="fas fa-recycle">fas fa-recycle</option>
                                    <option value="fas fa-reddit">fas fa-reddit</option>
                                    <option value="fas fa-reddit-square">fas fa-reddit-square</option>
                                    <option value="fas fa-refresh">fas fa-refresh</option>
                                    <option value="fas fa-registered">fas fa-registered</option>
                                    <option value="fas fa-remove">fas fa-remove</option>
                                    <option value="fas fa-renren">fas fa-renren</option>
                                    <option value="fas fa-reorder">fas fa-reorder</option>
                                    <option value="fas fa-repeat">fas fa-repeat</option>
                                    <option value="fas fa-reply">fas fa-reply</option>
                                    <option value="fas fa-reply-all">fas fa-reply-all</option>
                                    <option value="fas fa-retweet">fas fa-retweet</option>
                                    <option value="fas fa-rmb">fas fa-rmb</option>
                                    <option value="fas fa-road">fas fa-road</option>
                                    <option value="fas fa-rocket">fas fa-rocket</option>
                                    <option value="fas fa-rotate-left">fas fa-rotate-left</option>
                                    <option value="fas fa-rotate-right">fas fa-rotate-right</option>
                                    <option value="fas fa-rouble">fas fa-rouble</option>
                                    <option value="fas fa-rss">fas fa-rss</option>
                                    <option value="fas fa-rss-square">fas fa-rss-square</option>
                                    <option value="fas fa-rub">fas fa-rub</option>
                                    <option value="fas fa-ruble">fas fa-ruble</option>
                                    <option value="fas fa-rupee">fas fa-rupee</option>
                                    <option value="fas fa-safas fari">fas fa-safas fari</option>
                                    <option value="fas fa-sliders">fas fa-sliders</option>
                                    <option value="fas fa-slideshare">fas fa-slideshare</option>
                                    <option value="fas fa-smile">fas fa-smile</option>
                                    <option value="fas fa-sort-asc">fas fa-sort-asc</option>
                                    <option value="fas fa-sort-desc">fas fa-sort-desc</option>
                                    <option value="fas fa-sort-down">fas fa-sort-down</option>
                                    <option value="fas fa-spinner">fas fa-spinner</option>
                                    <option value="fas fa-spoon">fas fa-spoon</option>
                                    <option value="fas fa-spotify">fas fa-spotify</option>
                                    <option value="fas fa-square">fas fa-square</option>
                                    <option value="fas fa-square">fas fa-square</option>
                                    <option value="fas fa-star">fas fa-star</option>
                                    <option value="fas fa-star-half">fas fa-star-half</option>
                                    <option value="fas fa-stop">fas fa-stop</option>
                                    <option value="fas fa-subscript">fas fa-subscript</option>
                                    <option value="fas fa-tablet">fas fa-tablet</option>
                                    <option value="fas fa-tachometer">fas fa-tachometer</option>
                                    <option value="fas fa-tag">fas fa-tag</option>
                                    <option value="fas fa-tags">fas fa-tags</option>
                                </select>
                                @error('icon')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="deadline-form">

                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="datepickerded123" class="form-label">Date de début du
                                            projet</label>
                                        <input type="date"
                                            class="form-control @error('date_debut') is-invalid @enderror"
                                            id="datepickerded123"
                                            value="{{ $project->date_debut->format('Y-m-d') }}" name="date_debut">
                                        @error('date_debut')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="datepickerded456" class="form-label">Date de fin du
                                            projet</label>
                                        <input type="date"
                                            class="form-control @error('date_fin') is-invalid @enderror"
                                            id="datepickerded456" value="{{ $project->date_fin->format('Y-m-d') }}"
                                            name="date_fin">
                                        @error('date_fin')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col-sm-12">
                                        <label for="formFileMultipleone" class="form-label">Personne affectée à la
                                            tâche</label>
                                        <select name="users[]"
                                            class="form-select @error('users[]') is-invalid @enderror" multiple
                                            aria-label="Default select Priority">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ collect($project->users()->pluck('id')->contains($user->id))? 'selected': '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('users[]')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Budget</label>
                                    <input type="number"
                                        class="form-control @error('budjet') is-invalid @enderror" name="budjet"
                                        value="{{ $project->budjet ?? old('budjet') }}">
                                    @error('budjet')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm">
                                    <label for="formFileMultipleone" class="form-label">Priorité</label>
                                    <select class="form-select @error('priority') is-invalid @enderror"
                                        aria-label="Default select Priority" name="priority">
                                        <option value="élevé"
                                            {{ $project->priority == 'élevé' ? 'selected' : '' }}>
                                            Supérieure</option>
                                        <option value="Moyenne"
                                            {{ $project->priority == 'Moyenne' ? 'selected' : '' }}>
                                            Moyenne</option>
                                        <option value="faible"
                                            {{ $project->priority == 'faible' ? 'selected' : '' }}>
                                            Faible
                                        </option>
                                        <option value="bas" {{ $project->priority == 'bas' ? 'selected' : '' }}>
                                            Le
                                            plus
                                            bas</option>
                                    </select>
                                    @error('priority')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea786" class="form-label">Description
                                    (facultatif)</label>
                                <textarea class="form-control" id="exampleFormControlTextarea786" rows="3" name="description">{{ $project->description ?? old('description') }}
                </textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
</div>
<!-- Modal  Delete Folder/ File-->
@foreach ($projects as $project)
    <form action="{{ route('projects.destroy', $project) }}" method="post">
        @csrf
        @method('Delete')
        <div class="modal fade" id="deleteproject{{ $project->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Supprimer l'élément de façon
                            permanente
                            ?
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body justify-content-center flex-column d-flex">
                        <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                        <p class="mt-4 fs-5 text-center">Vous ne pouvez supprimer cet élément que de façon permanente
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger color-fff">Supprimer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endforeach
@endsection
@section('modal-member')
@include('layouts.modal_member')
@endsection
@section('scripts')

<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('https://pixelwibes.com/template/my-task/html/js/template.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select2-icon').select2();
    });
</script>
@endsection
