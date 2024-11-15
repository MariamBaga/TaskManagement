@extends('main')
@section('title', 'Nouveau projet')
@section('head')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('assets/images/logoTaskerate.jpeg')}}" >
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
                        <h3 class="fw-bold flex-fill mb-0 mt-sm-0">Utilisateurs</h3>
                        <button type="button" class="btn me-1 mt-1 w-sm-100" data-bs-toggle="modal"
                            data-bs-target="#createemp" style="background-color: #FC7C04; color: black;">
                            <i class="icofont-plus-circle me-2 fs-6"></i>Ajouter un Utilisateur
                        </button>


                    </div>
                </div>
            </div>
        </div><!-- Fin de ligne -->
        <div
            class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-2 row-deck py-1 pb-4">
            @foreach ($users as $user)
                <div class="col">
                <div class="card teacher-card" style="border: 2px solid #EEE4FE;">
    <div class="card-body d-flex">
        <div class="profile-av pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
            <img src="{{ asset('storage/'.$user->image) }}" alt=""
                class="avatar xl rounded-circle img-thumbnail shadow-sm">
            <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                <div class="followers me-2">
                    <i class="icofont-tasks color-careys-pink fs-4"></i>
                    <span class="">{{ $user->tasks->where('statut', 'complet')->count()}}</span>
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
                class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-11 mb-0 mt-1">{{ $user->profile }}
            </span>
            <div class="video-setting-icon mt-3 pt-3 border-top">
                <p>{{ $user->description }}</p>
            </div>
            <a href="{{ route('tasks.index') }}" class="btn btn-dark btn-sm mt-1"><i
                    class="icofont-plus-circle me-2 fs-6"></i>Ajouter Tâche</a>
            <a href="{{ route('users.show', $user) }}" class="btn btn-sm mt-1" style="background-color: #FC7C04; color: white;">
                <i class="icofont-invisible me-2 fs-6"></i>Profil
            </a>
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
<script src="{{ asset('assets/js/chatbot.js') }}"></script>


<!-- select2 JS Scripts -->
<script src="{{ asset('site/assets/js/select2.full.min.js') }}"></script>
@endsection
