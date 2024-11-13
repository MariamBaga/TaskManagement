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
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center  justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Profile</h3>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
        <div class="row g-3">
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body  d-flex teacher-fulldeatil">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-0 text-center w220 mx-sm-0 mx-auto">
                            <a href="#">
                                <img src="{{ asset('storage/' . $user->image) }}" alt=""
                                    class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                <h6 class="mb-0 fw-bold d-block fs-6">{{ $user->profile }}</h6>
                                {{-- <span class="text-muted small">Employee Id : 00001</span> --}}
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-3 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold d-block fs-6">{{ $user->name }}</h6>
                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted">Web Designer</span>
                            <p class="mt-2 small">{{ $user->description }}</p>
                            <div class="row g-2 pt-2">
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-ui-touch-phone"></i>
                                        <span class="ms-2 small">{{ $user->phone }} </span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-email"></i>
                                        <span class="ms-2 small">{{ $user->email }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-birthday-cake"></i>
                                        <span class="ms-2 small">{{ $user->started_at }}</span>
                                    </div>
                                </div>
                                <div class="col-xl-5">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-address-book"></i>
                                        <span class="ms-2 small">{{ $user->address }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="fw-bold  py-3 mb-3">Projet actuel</h6>
                <div class="teachercourse-list">
                    @foreach ($user->projects()->get() as $project)
                        <div class="row g-3 gy-5 py-3 row-deck">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                            <div class="lesson_name">
                                                <div class="project-block light-info-bg">
                                                    <i class="{{ $project->icon }}"></i>
                                                </div>
                                                <span class="small text-muted project_name fw-bold"> {{$project->nom }}
                                                </span>
                                                <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $project->category }}</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-list avatar-list-stacked pt-2">
                                                @foreach ($project->users()->get() as $user)
                                                    <img class="avatar rounded-circle sm"
                                                        src="{{ asset('sotrage/' . $user->image) }}" alt="">
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row g-2 pt-4">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-paper-clip"></i>
                                                    <span class="ms-2">{{ $project->tasks->count()}} Taches</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-sand-clock"></i>
                                                    <span class="ms-2">4 Month</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-group-students "></i>
                                                    <span class="ms-2">{{ $project->users()->count() }} Membres</span>
                                                </div>
                                            </div>
                                            {{-- <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-ui-text-chat"></i>
                                                    <span class="ms-2">10</span>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="dividers-block"></div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h4 class="small fw-bold mb-0">Progress</h4>
                                            <span class="small light-danger-bg  p-1 rounded"><i
                                                    class="icofont-ui-clock"></i> 35 Days Left</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%"
                                                aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 25%" aria-valuenow="30" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            <div class="progress-bar bg-secondary ms-1" role="progressbar"
                                                style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <h6 class="mb-0 fw-bold ">Tâche actuelle</h6>
                    </div>
                    <div class="card-body">
                        <div class="planned_task client_task">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    @foreach ($user->tasks as $task)
                                        <li class="dd-item mb-3">
                                            <div class="dd-handle">
                                                <div
                                                    class="task-info d-flex align-items-center justify-content-between">
                                                    <h6
                                                        class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                                        {{ $task->titre }}</h6>
                                                    <div
                                                        class="task-priority d-flex flex-column align-items-center justify-content-center">
                                                        <div class="avatar-list avatar-list-stacked m-0">
                                                            <img class="avatar rounded-circle small-avt sm"
                                                                src="{{ asset('storage/' . $user->image) }}"
                                                                alt="image de profil">
                                                        </div>
                                                        <span
                                                            class="badge bg-warning text-end mt-1">{{ $task->statut }}</span>
                                                    </div>
                                                </div>
                                                <p class="py-2 mb-0">{{ $task->description }}</p>
                                                <div class="tikit-info row g-3 align-items-center">
                                                    <div class="col-sm">
                                                    </div>
                                                    <div class="col-sm text-end">
                                                        <div
                                                            class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->project->nom }} </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->

    </div>
</div>

<!-- edit Employer-->
@include('Admin.Employer.Profile.edit')
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
