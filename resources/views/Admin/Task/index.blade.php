@extends('main')
@section('title', 'Nouveau projet')
@section('head')

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @section('title', 'Nouveau Tâche')
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/css/my-task.style.min.css') }}">
</head>
@endsection
@section('content')
<!-- Body: Body -->
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div
                    class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Gestion des tâchesMembres des tâches allouées
                    </h3>
                    <div class="col-auto d-flex w-sm-100">
                        <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal"
                            data-bs-target="#createtask"><i class="icofont-plus-circle me-2 fs-6"></i>Créer une
                            tâche</button>
                    </div>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row clearfix  g-3">
            <div class="col-lg-12 col-md-12 flex-column">
                <div class="row g-3 row-deck">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="mb-0 fw-bold ">Progression des tâches</h6>
                            </div>
                            <div class="card-body mem-list">
                                <div class="progress-count mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="mb-0 fw-bold d-flex align-items-center">UI/UX Design</h6>
                                        <span class="small text-muted">02/07</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar light-info-bg" role="progressbar" style="width: 92%"
                                            aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="progress-count mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="mb-0 fw-bold d-flex align-items-center">Website Design</h6>
                                        <span class="small text-muted">01/03</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-lightgreen" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="progress-count mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="mb-0 fw-bold d-flex align-items-center">Quality Assurance</h6>
                                        <span class="small text-muted">02/07</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar light-success-bg" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="progress-count mb-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="mb-0 fw-bold d-flex align-items-center">Development</h6>
                                        <span class="small text-muted">01/05</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar light-orange-bg" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="progress-count mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <h6 class="mb-0 fw-bold d-flex align-items-center">Testing</h6>
                                        <span class="small text-muted">01/08</span>
                                    </div>
                                    <div class="progress" style="height: 10px;">
                                        <div class="progress-bar bg-lightyellow" role="progressbar" style="width: 30%"
                                            aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="mb-0 fw-bold ">Activité récente</h6>
                            </div>
                            <div class="card-body mem-list">
                                <div class="timeline-item ti-danger border-bottom ms-2">
                                    <div class="d-flex">
                                        <span
                                            class="avatar d-flex justify-content-center align-items-center rounded-circle light-success-bg">RH</span>
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>Rechard Ajouter une nouvelle tâche</strong>
                                            </div>
                                            <span class="d-flex text-muted">20Min ago</span>
                                        </div>
                                    </div>
                                </div> <!-- timeline item end  -->
                                <div class="timeline-item ti-info border-bottom ms-2">
                                    <div class="d-flex">
                                        <span
                                            class="avatar d-flex justify-content-center align-items-center rounded-circle bg-careys-pink">SP</span>
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>Shipa Review Completed</strong></div>
                                            <span class="d-flex text-muted">40Min ago</span>
                                        </div>
                                    </div>
                                </div> <!-- timeline item end  -->
                                <div class="timeline-item ti-info border-bottom ms-2">
                                    <div class="d-flex">
                                        <span
                                            class="avatar d-flex justify-content-center align-items-center rounded-circle bg-careys-pink">MR</span>
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>Mora Task To Completed</strong></div>
                                            <span class="d-flex text-muted">1Hr ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="timeline-item ti-success  ms-2">
                                    <div class="d-flex">
                                        <span
                                            class="avatar d-flex justify-content-center align-items-center rounded-circle bg-lavender-purple">FL</span>
                                        <div class="flex-fill ms-3">
                                            <div class="mb-1"><strong>Fila Add New Task</strong></div>
                                            <span class="d-flex text-muted">1Day ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card: My Timeline -->
                    </div>
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-header py-3">
                                <h6 class="mb-0 fw-bold ">Membres de la tâche allouée</h6>
                            </div>
                            <div class="card-body">
                                <div class="flex-grow-1 mem-list">
                                    <div class="py-2 d-flex align-items-center border-bottom">

                                        <div class="d-flex ms-2 align-items-center flex-fill">
                                            <img src="assets/images/xs/avatar6.jpg"
                                                class="avatar lg rounded-circle img-thumbnail" alt="avatar">
                                            <div class="d-flex flex-column ps-2">
                                                <h6 class="fw-bold mb-0">Lucinda Massey</h6>
                                                <span class="small text-muted">Ui/UX Designer</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn light-danger-bg text-end"
                                            data-bs-toggle="modal" data-bs-target="#dremovetask">Remove</button>
                                    </div>
                                    <div class="py-2 d-flex align-items-center border-bottom">

                                        <div class="d-flex ms-2 align-items-center flex-fill">
                                            <img src="assets/images/xs/avatar4.jpg"
                                                class="avatar lg rounded-circle img-thumbnail" alt="avatar">
                                            <div class="d-flex flex-column ps-2">
                                                <h6 class="fw-bold mb-0">Ryan Nolan</h6>
                                                <span class="small text-muted">Website Designer</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn light-danger-bg text-end"
                                            data-bs-toggle="modal" data-bs-target="#dremovetask">Remove</button>
                                    </div>
                                    <div class="py-2 d-flex align-items-center border-bottom">

                                        <div class="d-flex ms-2 align-items-center flex-fill">
                                            <img src="assets/images/xs/avatar9.jpg"
                                                class="avatar lg rounded-circle img-thumbnail" alt="avatar">
                                            <div class="d-flex flex-column ps-2">
                                                <h6 class="fw-bold mb-0">Oliver Black</h6>
                                                <span class="small text-muted">App Developer</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn light-danger-bg text-end"
                                            data-bs-toggle="modal" data-bs-target="#dremovetask">Remove</button>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- .card: My Timeline -->
                    </div>
                </div>
                <div class="row taskboard g-3 py-xxl-4">
                    <!-- Section In Progress -->
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-4 mt-sm-4 mt-4">
                        <h6 class="fw-bold py-3 mb-0">En cours</h6>
                        <div class="progress_task">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    @foreach ($tasksInProgress as $task)
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">
                                                <div
                                                    class="task-info d-flex align-items-center justify-content-between">
                                                    <h6
                                                        class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                                        {{ $task->titre }}</h6>
                                                    <div
                                                        class="task-priority d-flex flex-column align-items-center justify-content-center">
                                                        <div class="avatar-list avatar-list-stacked m-0">
                                                            <img class="avatar rounded-circle small-avt"
                                                                src="assets/images/xs/avatar3.jpg" alt="">
                                                            <img class="avatar rounded-circle small-avt"
                                                                src="assets/images/xs/avatar1.jpg" alt="">
                                                        </div>
                                                        <span
                                                            class="badge @if ($task->statut == 'encours') bg-warning @elseif($task->statut == 'review') bg-primary @else bg-success @endif text-end mt-2">{{ $task->statut }}</span>
                                                    </div>
                                                </div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editproject{{ $task->id }}"><i
                                                            class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteproject{{ $task->id }}"><i
                                                            class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                                <p class="py-2 mb-0">{{ $task->description }}</p>
                                                <div class="tikit-info row g-3 align-items-center">
                                                    <div class="col-sm">
                                                        <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                            <li class="me-2">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-flag"></i>
                                                                    <span
                                                                        class="ms-1">{{ $task->date_echeance->translatedFormat('d F') }}</span>
                                                                </div>
                                                            </li>
                                                            <li class="me-2">
                                                                <div class="d-flex align-items-center">

                                                                    <i class="icofont-ui-text-chat"></i>
                                                                    <span class="ms-1">7</span>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-paper-clip"></i>
                                                                    <span class="ms-1">2</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->titre }} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                    @foreach ($tasks as $task)
                        @include('Admin.Task.edit')
                    @endforeach


                    <!-- Section Needs Review -->
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-0 mt-sm-0 mt-0">
                        <h6 class="fw-bold py-3 mb-0">Besoin d'une révision</h6>
                        <div class="review_task">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    @foreach ($tasksNeedsReview as $task)
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">
                                                <div
                                                    class="task-info d-flex align-items-center justify-content-between">
                                                    <h6
                                                        class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                                        {{ $task->titre }}</h6>
                                                    <div
                                                        class="task-priority d-flex flex-column align-items-center justify-content-center">
                                                        <div class="avatar-list avatar-list-stacked m-0">
                                                            <img class="avatar rounded-circle small-avt"
                                                                src="assets/images/xs/avatar3.jpg" alt="">
                                                            <img class="avatar rounded-circle small-avt"
                                                                src="assets/images/xs/avatar1.jpg" alt="">
                                                        </div>
                                                        <span
                                                            class="badge @if ($task->statut == 'encours') bg-warning @elseif($task->statut == 'review') bg-primary @else bg-success @endif text-end mt-2">{{ $task->statut }}</span>
                                                    </div>
                                                </div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editproject{{ $task->id }}"><i
                                                            class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteproject{{ $task->id }}"><i
                                                            class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                                <p class="py-2 mb-0">{{ $task->description }}</p>
                                                <div class="tikit-info row g-3 align-items-center">
                                                    <div class="col-sm">
                                                        <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                            <li class="me-2">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-flag"></i>
                                                                    <span
                                                                        class="ms-1">{{ $task->date_echeance->translatedFormat('d F') }}</span>
                                                                </div>
                                                            </li>
                                                            <li class="me-2">
                                                                <div class="d-flex align-items-center">

                                                                    <i class="icofont-ui-text-chat"></i>
                                                                    <span class="ms-1">7</span>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-paper-clip"></i>
                                                                    <span class="ms-1">2</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->titre }} </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Section Completed -->
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 mt-xxl-4 mt-xl-4 mt-lg-4 mt-md-0 mt-sm-0 mt-0">
                        <h6 class="fw-bold py-3 mb-0">Completed</h6>
                        <div class="completed_task">
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    @foreach ($tasksCompleted as $task)
                                        <li class="dd-item" data-id="1">
                                            <div class="dd-handle">
                                                <div
                                                    class="task-info d-flex align-items-center justify-content-between">
                                                    <h6
                                                        class="light-info-bg py-1 px-2 rounded-1 d-inline-block fw-bold small-14 mb-0">
                                                        {{ $task->titre }}</h6>
                                                    <div
                                                        class="task-priority d-flex flex-column align-items-center justify-content-center">
                                                        <div class="avatar-list avatar-list-stacked m-0">
                                                            <img class="avatar rounded-circle small-avt"
                                                                src="assets/images/xs/avatar3.jpg" alt="">
                                                            <img class="avatar rounded-circle small-avt"
                                                                src="assets/images/xs/avatar1.jpg" alt="">
                                                        </div>
                                                        <span
                                                            class="badge @if ($task->statut == 'encours') bg-warning @elseif($task->statut == 'review') bg-primary @else bg-success @endif text-end mt-2">{{ $task->statut }}</span>
                                                    </div>
                                                </div>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editproject{{ $task->id }}"><i
                                                            class="icofont-edit text-success"></i></button>
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteproject{{ $task->id }}"><i
                                                            class="icofont-ui-delete text-danger"></i></button>
                                                </div>
                                                <p class="py-2 mb-0">{{ $task->description }}</p>
                                                <div class="tikit-info row g-3 align-items-center">
                                                    <div class="col-sm">
                                                        <ul class="d-flex list-unstyled align-items-center flex-wrap">
                                                            <li class="me-2">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-flag"></i>
                                                                    <span
                                                                        class="ms-1">{{ $task->date_echeance->translatedFormat('d F') }}</span>
                                                                </div>
                                                            </li>
                                                            <li class="me-2">
                                                                <div class="d-flex align-items-center">

                                                                    <i class="icofont-ui-text-chat"></i>
                                                                    <span class="ms-1">7</span>

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-paper-clip"></i>
                                                                    <span class="ms-1">2</span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate light-danger-bg py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->titre }} </div>
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
        </div>
    </div>
</div>
<!-- Create Task-->
<!-- Modal Members-->
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="addUserLabel">Invitation aux employés</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="inviteby_email">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email address"
                            id="exampleInputEmail1" aria-describedby="exampleInputEmail1">
                        <button class="btn btn-dark" type="button" id="button-addon2">Envoyé</button>
                    </div>
                </div>
                <div class="members_list">
                    <h6 class="fw-bold ">Employé </h6>
                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0">
                        <li class="list-group-item py-3 text-center text-md-start">
                            <div
                                class="d-flex align-items-center flex-column flex-sm-column flex-md-column flex-lg-row">
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

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('tasks.store') }}" method="post">
    @csrf
    @include('Admin.Task.create')
</form>




<!-- Modal  Remove Task-->
<div class="modal fade" id="dremovetask" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="dremovetaskLabel"> Supprimer de la tâche?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body justify-content-center flex-column d-flex">
                <i class="icofont-ui-rate-remove text-danger display-2 text-center mt-2"></i>
                <p class="mt-4 fs-5 text-center">You can Remove only From Task</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger color-fff">Remove</button>
            </div>
        </div>
    </div>
</div>
</div>

<!-- start: template setting, and more. -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas_setting" aria-labelledby="offcanvas_setting">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Template Setting</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column">
        <div class="mb-4">
            <h6>Set Theme Color</h6>
            <ul class="choose-skin list-unstyled mb-0">
                <li data-theme="ValenciaRed">
                    <div style="--mytask-theme-color: #D63B38;"></div>
                </li>
                <li data-theme="SunOrange">
                    <div style="--mytask-theme-color: #F7A614;"></div>
                </li>
                <li data-theme="AppleGreen">
                    <div style="--mytask-theme-color: #5BC43A;"></div>
                </li>
                <li data-theme="CeruleanBlue">
                    <div style="--mytask-theme-color: #00B8D6;"></div>
                </li>
                <li data-theme="Mariner">
                    <div style="--mytask-theme-color: #0066FE;"></div>
                </li>
                <li data-theme="PurpleHeart" class="active">
                    <div style="--mytask-theme-color: #6238B3;"></div>
                </li>
                <li data-theme="FrenchRose">
                    <div style="--mytask-theme-color: #EB5393;"></div>
                </li>
            </ul>
        </div>
        <div class="mb-4 flex-grow-1">
            <h6>Set Theme Light/Dark/RTL</h6>
            <!-- Theme: Switch Theme -->
            <ul class="list-unstyled mb-0">
                <li>
                    <div class="form-check form-switch theme-switch">
                        <input class="form-check-input fs-6" type="checkbox" role="switch" id="theme-switch">
                        <label class="form-check-label mx-2" for="theme-switch">Enable Dark Mode!</label>
                    </div>
                </li>
                <li>
                    <div class="form-check form-switch theme-rtl">
                        <input class="form-check-input fs-6" type="checkbox" role="switch" id="theme-rtl">
                        <label class="form-check-label mx-2" for="theme-rtl">Enable RTL Mode!</label>
                    </div>
                </li>
                <li>
                    <div class="form-check form-switch monochrome-toggle">
                        <input class="form-check-input fs-6" type="checkbox" role="switch" id="monochrome">
                        <label class="form-check-label mx-2" for="monochrome">Monochrome Mode</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="d-flex">
            <a href="https://themeforest.net/item/mytask-hr-project-management-admin-template/31974551"
                class="btn w-100 me-1 py-2 btn-primary">Buy Now</a>
            <a href="https://themeforest.net/user/pixelwibes/portfolio" class="btn w-100 ms-1 py-2 btn-dark">View
                Portfolio</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Jquery Core Js -->
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>

<!-- Jquery Page Js -->
<script src="{{ asset('https://pixelwibes.com/template/my-task/html/js/template.js') }}"></script>
@endsection
