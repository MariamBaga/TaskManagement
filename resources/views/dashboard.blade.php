@extends('main')

<!-- Mirrored from pixelwibes.com/template/my-task/html/dist/project-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 07 Nov 2024 12:50:51 GMT -->
@section('head')


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('titile') </title>
        <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
        <!-- plugin css file  -->
        <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/responsive.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugin/datatables/dataTables.bootstrap5.min.css') }}">
        <!-- project css file  -->
        <link rel="stylesheet" href="{{ asset('assets/css/my-task.style.min.css') }}">
    </head>
@endsection

@section('content')



@if (session('error'))
    <div class="alert alert-error alert-dismissible fade show" role="alert">

    {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<!-- Corps: Corps -->
<div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row g-3 mb-3 row-deck">
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                <div class="avatar lg rounded-1 no-thumbnail" style="background-color: #EEE4FE; color: #333;">
    <i class="bi bi-journal-check fs-4"></i>
</div>

                                    <div class="flex-fill ms-4">
                                        <div class="">Tâches Totales</div>
                                        <h5 class="mb-0 ">{{ auth()->user()->role == "admin" ? $tasks->count() : auth()->user()->tasks()->count()}}</h5>
                                    </div>
                                    <a href="{{ route('tasks.index') }}" title="voir-les-membres" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                <div class="avatar lg rounded-1 no-thumbnail" style="background-color: #EEE4FE; color: #333;">
    <i class="bi bi-list-check fs-4"></i>
</div>

                                    <div class="flex-fill ms-4">
                                        <div class="">Tâches Terminées</div>
                                        <h5 class="mb-0 ">{{ auth()->user()->role == "admin" ? $tasks->where('statut', 'complet')->count() : auth()->user()->tasks()->where('statut', 'complet')->count()}}</h5>
                                    </div>
                                    <a href="{{ route('tasks.index') }}" title="espace-utilisé" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                <div class="avatar lg rounded-1 no-thumbnail" style="background-color: #EEE4FE; color: #333;">
    <i class="bi bi-clipboard-data fs-4"></i>
</div>

                                    <div class="flex-fill ms-4">
                                        <div class="">Tâches en Cours</div>
                                        <h5 class="mb-0 ">{{ auth()->user()->role == "admin" ? $tasks->where('statut', 'encours')->count() : auth()->user()->tasks()->where('statut', 'encours')->count()}}</h5>
                                    </div>
                                    <a href="{{ route('tasks.index') }}" title="date-de-renouvellement" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin de la ligne -->

                <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 row-cols-xxl-4">
    <div class="col">
        <div class="card" style="background-color: white; border: 2px solid #EEE4FE;">
            <div class="card-body text-dark d-flex align-items-center">
                <i class="icofont-data fs-3"></i>
                <div class="d-flex flex-column ms-3">
                    <h6 class="mb-0">Projets Totaux</h6>
                    <span>{{ auth()->user()->role == "admin" ? $projects->count() : auth()->user()->projects()->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="background-color: white; border: 2px solid #EEE4FE;">
            <div class="card-body text-dark d-flex align-items-center">
                <i class="icofont-chart-flow fs-3"></i>
                <div class="d-flex flex-column ms-3">
                    <h6 class="mb-0">Projets à venir</h6>
                    <span>{{ auth()->user()->role == "admin" ? $projects->where('statut', 'debut')->count() : auth()->user()->projects()->where('statut', 'debut')->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="background-color: white; border: 2px solid #EEE4FE;">
            <div class="card-body text-dark d-flex align-items-center">
                <i class="icofont-chart-flow-2 fs-3"></i>
                <div class="d-flex flex-column ms-3">
                    <h6 class="mb-0">Projets en Cours</h6>
                    <span>{{ auth()->user()->role == "admin" ? $projects->where('statut', 'encours')->count() : auth()->user()->projects()->where('statut', 'encours')->count() }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card" style="background-color: white; border: 2px solid #EEE4FE;">
            <div class="card-body text-dark d-flex align-items-center">
                <i class="icofont-tasks fs-3"></i>
                <div class="d-flex flex-column ms-3">
                    <h6 class="mb-0">Projets Terminés</h6>
                    <span>{{ $projects->where('statut', 'complet')->count() }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

                <div class="row g-3 mb-3 row-deck">
                    <div class="col-md-12">
                        <div class="card mb-3">
                                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                                    <div class="info-header">
                                        <h6 class="mb-0 fw-bold ">Informations sur le Projet</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Titre</th>
                                                <th>Date de Début</th>
                                                <th>Date Limite</th>
                                                <th>Chef de Projet</th>
                                                <th>Avancement</th>
                                                <th>État</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(auth()->user()->projects()->get() as $project)
                                            <tr>
                                                <td><a href="{{ route('projects.index') }}">{{ $project->nom }}</a></td>
                                                <td>{{ $project->date_debut->translatedFormat('d/m/Y') }}</td>
                                                <td>{{ $project->date_fin->translatedFormat('d/m/Y') }}</td>
                                                <td><img src="{{ $project->users->first()->image }}" alt="Avatar" class="avatar sm  rounded-circle me-2"><a href="#">{{ $project->users->first()->name }}</a></td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"  style="width: @if($project->statut =='debut') 5% @elseif($project->statut =='encours') 50% @else 100% @endif;">@if($project->statut =='debut') 5% @elseif($project->statut =='encours') 50% @else 100% @endif</div>
                                                    </div>
                                                </td>
                                                <td><span class="badge @if($project->priority == 'élévé') bg-danger @elseif($project->priority == 'Moyenne') bg-warning @else bg-success @endif">{{ $project->priority }}</span></td>
                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div><!-- Fin de la ligne -->
            </div>
        </div>
@endsection

@section('modal-member')
@endsection
</div>

@section('scripts')
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>

    <!-- Plugin Js-->
    <script src="assets/bundles/apexcharts.bundle.js"></script>
    <script src="assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="assets/js/template.js"></script>
    <script src="../js/page/index.js"></script>
@endsection
