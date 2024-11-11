@extends('main')
@section('title', 'Nouveau projet')
@section('head')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
                                    role="tab">Démarré</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Approval-list"
                                    role="tab">Approuvé</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Completed-list"
                                    role="tab">Terminé</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 flex-column">
                <div class="tab-content mt-4">
                    {{-- all projects list --}}
                    <div class="tab-pane fade show active" id="All-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            @foreach ($projects as $project)
                                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between mt-5">
                                                <div class="lesson_name">
                                                    <div class="project-block light-orange-bg">
                                                        <i class="icofont-dashboard-web"></i>
                                                    </div>
                                                    <span class="small text-muted project_name fw-bold">
                                                        {{ $project->category }}
                                                    </span>
                                                    <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $project->nom }}</h6>
                                                </div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#editproject"><i
                                                            class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#deleteproject"><i
                                                            class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-list avatar-list-stacked pt-2">
                                                    @foreach ($project->users as $user)
                                                        <img class="avatar rounded-circle sm" src="{{ $user->image }}"
                                                            alt="">
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
                                                            class="ms-2">{{ $project->date_debut->diffInMonths($project->date_fin) }}
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Started-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="lesson_name">
                                                <div class="project-block bg-lightgreen">
                                                    <i class="icofont-vector-path"></i>
                                                </div>
                                                <span class="small text-muted project_name fw-bold"> Practice to
                                                    Perfect </span>
                                                <h6 class="mb-0 fw-bold  fs-6  mb-2">Website Design</h6>
                                            </div>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#editproject"><i
                                                        class="icofont-edit text-success"></i></button>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#deleteproject"><i
                                                        class="icofont-ui-delete text-danger"></i></button>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-list avatar-list-stacked pt-2">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar2.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar1.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar3.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar4.jpg" alt="">
                                                <span class="avatar rounded-circle text-center pointer sm"
                                                    data-bs-toggle="modal" data-bs-target="#addUser"><i
                                                        class="icofont-ui-add"></i></span>
                                            </div>
                                        </div>
                                        <div class="row g-2 pt-4">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-paper-clip"></i>
                                                    <span class="ms-2">4 Attach</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-sand-clock"></i>
                                                    <span class="ms-2">1 Month</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-group-students "></i>
                                                    <span class="ms-2">4 Members</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-text-chat"></i>
                                                    <span class="ms-2">3</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dividers-block"></div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h4 class="small fw-bold mb-0">Progress</h4>
                                            <span class="small light-danger-bg  p-1 rounded"><i
                                                    class="icofont-ui-clock"></i> 15 Days
                                                Left</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: 25%" aria-valuenow="15" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 39%" aria-valuenow="39" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Approval-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="lesson_name">
                                                <div class="project-block light-orange-bg">
                                                    <i class="icofont-dashboard-web"></i>
                                                </div>
                                                <span class="small text-muted project_name fw-bold"> Barcelona </span>
                                                <h6 class="mb-0 fw-bold  fs-6  mb-2">Development</h6>
                                            </div>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic outlined example">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#editproject"><i
                                                        class="icofont-edit text-success"></i></button>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#deleteproject"><i
                                                        class="icofont-ui-delete text-danger"></i></button>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-list avatar-list-stacked pt-2">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar2.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar1.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar3.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar4.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar8.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar9.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar7.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar10.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar11.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar6.jpg" alt="">
                                                <span class="avatar rounded-circle text-center pointer sm"
                                                    data-bs-toggle="modal" data-bs-target="#addUser"><i
                                                        class="icofont-ui-add"></i></span>
                                            </div>
                                        </div>
                                        <div class="row g-2 pt-4">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-paper-clip"></i>
                                                    <span class="ms-2">10 Attach</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-sand-clock"></i>
                                                    <span class="ms-2">10 Month</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-group-students "></i>
                                                    <span class="ms-2">10 Members</span>
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
                                            <h4 class="small fw-bold mb-0">Progress</h4>
                                            <span class="small light-warning-bg  p-1 rounded"><i
                                                    class="icofont-ui-clock"></i>
                                                Approval</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: 0%" aria-valuenow="15" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 0%" aria-valuenow="30" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 0%" aria-valuenow="80" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Completed-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="lesson_name">
                                                <div class="project-block light-info-bg">
                                                    <i class="icofont-paint"></i>
                                                </div>
                                                <span class="small text-muted project_name fw-bold"> Sunburst </span>
                                                <h6 class="mb-0 fw-bold  fs-6  mb-2">UI/UX Design</h6>
                                            </div>
                                            <div class="btn-group" role="group"
                                                aria-label="Basic outlined example">

                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal" data-bs-target="#deleteproject"><i
                                                        class="icofont-ui-delete text-danger"></i></button>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-list avatar-list-stacked pt-2">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar2.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar1.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar3.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar4.jpg" alt="">
                                                <img class="avatar rounded-circle sm"
                                                    src="assets/images/xs/avatar8.jpg" alt="">

                                            </div>
                                        </div>
                                        <div class="row g-2 pt-4">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-paper-clip"></i>
                                                    <span class="ms-2">5 Attach</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-sand-clock"></i>
                                                    <span class="ms-2 text-success">Completed</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-group-students "></i>
                                                    <span class="ms-2">5 Members</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-text-chat"></i>
                                                    <span class="ms-2">10</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dividers-block"></div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h4 class="small fw-bold mb-0">Progress</h4>
                                            <span class="small light-success-bg  p-1 rounded"><i
                                                    class="icofont-ui-clock"></i>
                                                Completed</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar"
                                                style="width: 25%" aria-valuenow="15" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 50%" aria-valuenow="39" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <label for="formFileMultipleone"
                                class="form-label @error('image') is-invalid @enderror">Images et documents du
                                projet</label>
                            <input class="form-control" type="file" id="formFileMultipleone" multiple
                                name="image">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFileMultipleone"
                                class="form-label">Icon</label>
                            <select class="form-select @error('icon') is-invalid @enderror"
                                aria-label="Default select Project Icon" name="icon">
                                <option value="UI/UX Design"
                                    {{ old('category') == 'UI/UX Design' ? 'selected' : '' }}>
                                    UI/UX Design</option>
                                
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
<<<<<<< HEAD
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
<div class="modal fade" id="editproject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="editprojectLabel"> Editer le projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput78" class="form-label">Nom du projet</label>
                    <input type="text" class="form-control" id="exampleFormControlInput78"
                        value="Social Geek Made" name="name">
                </div>
                <div class="mb-3">
                    <label class="form-label">Catégorie de projet</label>
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option selected>UI/UX Design</option>
                        <option value="1">Website Design</option>
                        <option value="2">App Development</option>
                        <option value="3">Quality Assurance</option>
                        <option value="4">Development</option>
                        <option value="5">Backend Development</option>
                        <option value="6">Software Testing</option>
                        <option value="7">Website Design</option>
                        <option value="8">Marketing</option>
                        <option value="9">SEO</option>
                        <option value="10">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple456" class="form-label">Images et documents du projet</label>
                    <input class="form-control" type="file" id="formFileMultiple456" name="img">
                </div>
                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="datepickerded123" class="form-label">Date de début du projet</label>
                                <input type="date" class="form-control" id="datepickerded123" value="2021-01-10"
                                    name="start_at">
                            </div>
                            <div class="col">
                                <label for="datepickerded456" class="form-label">Date de fin du projet</label>
                                <input type="date" class="form-control" id="datepickerded456" value="2021-04-10"
                                    name="end_at">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-12">
                                <label class="form-label">Notification envoyée</label>
                                <select class="form-select" aria-label="Default select example" name="notification">
                                    <option selected>Tous</option>
                                    <option value="1">Chef d'équipe uniquement</option>
                                    <option value="2">Membre de l'équipe uniquement</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label for="formFileMultipleone" class="form-label">Personne affectée à la
                                    tâche</label>
                                <select class="form-select" multiple aria-label="Default select Priority"
                                    name="users[]">
                                    <option selected>Lucinda Massey</option>
                                    <option selected value="1">Ryan Nolan</option>
                                    <option selected value="2">Oliver Black</option>
                                    <option selected value="3">Adam Walker</option>
                                    <option selected value="4">Brian Skinner</option>
                                    <option value="5">Dan Short</option>
                                    <option value="5">Jack Glover</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-sm">
                        <label for="formFileMultipleone" class="form-label">Priorité</label>
                        <select class="form-select" aria-label="Default select Priority" name="priority">
                            <option selected>Moyenne</option>
                            <option value="1">Supérieure</option>
                            <option value="2">Faible</option>
                            <option value="3">Plus faible</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea786" class="form-label">Description (facultatif)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea786" rows="3" name="description">Social Geek Made,
                </textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terminé</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal  Delete Folder/ File-->
<div class="modal fade" id="deleteproject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="deleteprojectLabel">Supprimer l'élément de façon permanente ?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body justify-content-center flex-column d-flex">
                <i class="icofont-ui-delete text-danger display-2 text-center mt-2"></i>
                <p class="mt-4 fs-5 text-center">Vous ne pouvez supprimer cet élément que de façon permanente</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger color-fff">Supprimer</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('modal-member')
@include('layouts.modal_member')
@endsection
@section('scripts')
<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('https://pixelwibes.com/template/my-task/html/js/template.js') }}"></script>
@endsection
