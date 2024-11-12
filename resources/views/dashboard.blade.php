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

<!-- Corps: Corps -->
<div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row g-3 mb-3 row-deck">
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightyellow color-defult"><i class="bi bi-journal-check fs-4"></i></div>
                                    <div class="flex-fill ms-4">
                                        <div class="">Tâches Totales</div>
                                        <h5 class="mb-0 ">122</h5>
                                    </div>
                                    <a href="task.html" title="voir-les-membres" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightblue color-defult"><i class="bi bi-list-check fs-4"></i></div>
                                    <div class="flex-fill ms-4">
                                        <div class="">Tâches Terminées</div>
                                        <h5 class="mb-0 ">376</h5>
                                    </div>
                                    <a href="task.html" title="espace-utilisé" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightgreen color-defult"><i class="bi bi-clipboard-data fs-4"></i></div>
                                    <div class="flex-fill ms-4">
                                        <div class="">Tâches en Cours</div>
                                        <h5 class="mb-0 ">74</h5>
                                    </div>
                                    <a href="task.html" title="date-de-renouvellement" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Fin de la ligne -->

                <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 row-cols-xxl-4">
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex align-items-center">
                                <i class="icofont-data fs-3"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-0">Projets Totaux</h6>
                                    <span class="text-white">550</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex align-items-center">
                                <i class="icofont-chart-flow fs-3"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-0">Projets à Venir</h6>
                                    <span class="text-white">210</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex align-items-center">
                                <i class="icofont-chart-flow-2 fs-3"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-0">Projets en Cours</h6>
                                    <span class="text-white">8456 Fichiers</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex align-items-center">
                                <i class="icofont-tasks fs-3"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-0">Projets Terminés</h6>
                                    <span class="text-white">88 Fichiers</span>
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
                                            <tr>
                                                <td><a href="projects.html">Social Geek Made</a></td>
                                                <td>10-01-2021</td>
                                                <td>4 Mois</td>
                                                <td><img src="assets/images/xs/avatar1.jpg" alt="Avatar" class="avatar sm  rounded-circle me-2"><a href="#">Keith</a></td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"  style="width: 78%;">78%</div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning">MOYENNE</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="projects.html">Practice to Perfect</a></td>
                                                <td>12-02-2021</td>
                                                <td>1 Mois</td>
                                                <td><img src="assets/images/xs/avatar2.jpg" alt="Avatar" class="avatar sm rounded-circle me-2"><a href="#">Colin</a></td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar  bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">FAIBLE</span></td>
                                            </tr>

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
