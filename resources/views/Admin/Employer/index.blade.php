@extends('main')
@section('title', 'Nouveau projet')
@section('head')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{ asset('site/assets/css/select2.min.css') }}">
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
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div
                        class="card-header py-3 px-0 d-sm-flex align-items-center justify-content-between border-bottom">
                        <h3 class="fw-bold flex-fill mb-0 mt-sm-0">Employé</h3>
                        <button type="button" class="btn btn-dark me-1 mt-1 w-sm-100" data-bs-toggle="modal"
                            data-bs-target="#createemp"><i class="icofont-plus-circle me-2 fs-6"></i>Ajouter
                            un Utilisateur</button>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle mt-1 w-sm-100" type="button"
                                id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                Statut
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item" href="#">Tous</a></li>
                                <li><a class="dropdown-item" href="#">Membres avec Tâches</a></li>
                                <li><a class="dropdown-item" href="#">Membres sans Tâches</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Fin de ligne -->
        <div
            class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4">
            @foreach ($users as $user)
                <div class="col">
                    <div class="card teacher-card">
                        <div class="card-body d-flex">

                            <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                                <img src="{{ asset('storage/'.$user->image) }}" alt=""
                                    class="avatar xl rounded-circle img-thumbnail shadow-sm">
                                <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                    <div class="followers me-2">
                                        <i class="icofont-tasks color-careys-pink fs-4"></i>
                                        <span class="">{{ $user->tasks->where('statut', 'complet')->count()}}</span>
                                    </div>
                                    <div class="star me-2">
                                        <i class="icofont-star text-warning fs-4"></i>
                                        <span class="">4.5</span>
                                    </div>
                                    <div class="own-video">
                                        <i class="icofont-data color-light-orange fs-4"></i>
                                        <span class="">{{ $user->tasks->count() }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                                <h6 class="mb-0 mt-2 fw-bold d-block fs-6">{{ $user->name }}</h6>
                                <span
                                    class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">{{ $user->profile}}
                                    </span>
                                <div class="video-setting-icon mt-3 pt-3 border-top">
                                    <p>{{ $user->description }}</p>
                                </div>
                                <a href="{{ route('tasks.index') }}" class="btn btn-dark btn-sm mt-1"><i
                                        class="icofont-plus-circle me-2 fs-6"></i>Ajouter Tâche</a>
                                <a href="{{ route('users.show', $user) }}" class="btn btn-dark btn-sm mt-1"><i
                                        class="icofont-invisible me-2 fs-6"></i>Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="col">
                <div class="card teacher-card">
                    <div class="card-body d-flex">
                        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <img src="assets/images/lg/avatar4.jpg" alt=""
                                class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                <div class="followers me-2">
                                    <i class="icofont-tasks color-careys-pink fs-4"></i>
                                    <span class="">00</span>
                                </div>
                                <div class="star me-2">
                                    <i class="icofont-star text-warning fs-4"></i>
                                    <span class="">00</span>
                                </div>
                                <div class="own-video">
                                    <i class="icofont-data color-light-orange fs-4"></i>
                                    <span class="">00</span>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2 fw-bold d-block fs-6">Lillian Powell</h6>
                            <span
                                class="light-success-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">Assurance
                                Qualité</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices. Vestibulum ante
                                    ipsum primis in faucibus orci luctus et ultrices.</p>
                            </div>
                            <a href="{{ route('tasks.index') }}" class="btn btn-dark btn-sm mt-1"><i
                                    class="icofont-plus-circle me-2 fs-6"></i>Première Tâche</a>
                            <a href="{{ route('employeeProfile.index') }}" class="btn btn-dark btn-sm mt-1"><i
                                    class="icofont-invisible me-2 fs-6"></i>Profil</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>


<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">Employee Invitation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inviteby_email">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email address"
                            id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                        <button class="btn btn-dark" type="button" id="button-addon2">Sent</button>
                    </div>
                </div>
                <div class="members_list">
                    <h6 class="fw-bold ">Employee </h6>
                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="assets/images/xs/avatar2.jpg"
                                        alt="">
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Rachel Carr(you)</h6>
                                    <span class="text-muted">rachel.carr@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <span class="members-role ">Admin</span>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="assets/images/xs/avatar3.jpg"
                                        alt="">
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Lucas Baker<a href="#"
                                            class="link-secondary ms-2">(Resend invitation)</a></h6>
                                    <span class="text-muted">lucas.baker@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Members
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="icofont-check-circled"></i>
                                                    Member
                                                    <span>Can view, edit, delete, comment on and save files</span>
                                                </a>

                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fs-6 p-2 me-1"></i>
                                                    Admin
                                                    <span>Member, but can invite and manage team members</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="icofont-ui-settings  fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="icofont-delete-alt fs-6 me-2"></i>Delete Member</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                <div class="no-thumbnail mb-2 mb-md-0">
                                    <img class="avatar lg rounded-circle" src="assets/images/xs/avatar8.jpg"
                                        alt="">
                                </div>
                                <div class="flex-fill ms-3 text-truncate">
                                    <h6 class="mb-0  fw-bold">Una Coleman</h6>
                                    <span class="text-muted">una.coleman@gmail.com</span>
                                </div>
                                <div class="members-action">
                                    <div class="btn-group">
                                        <button type="button" class="btn bg-transparent dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Members
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="icofont-check-circled"></i>
                                                    Member
                                                    <span>Can view, edit, delete, comment on and save files</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="fs-6 p-2 me-1"></i>
                                                    Admin
                                                    <span>Member, but can invite and manage team members</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            <button type="button" class="btn bg-transparent dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="icofont-ui-settings  fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-ui-password fs-6 me-2"></i>ResetPassword</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-chart-line fs-6 me-2"></i>ActivityReport</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-delete-alt fs-6 me-2"></i>Suspend member</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="icofont-not-allowed fs-6 me-2"></i>Delete Member</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Create Employer-->
@include('Admin.Employer.create')
<!-- modale-->



<!-- Modal  Delete Folder/ File-->

@endsection
@section('modal-member')
@include('layouts.modal_member')
@endsection
@section('scripts')

<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('https://pixelwibes.com/template/my-task/html/js/template.js') }}"></script>

<!-- select2 JS Scripts -->
<script src="{{ asset('site/assets/js/select2.full.min.js') }}"></script>
@endsection
