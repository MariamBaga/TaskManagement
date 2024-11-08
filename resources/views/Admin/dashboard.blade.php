@extends('layouts.header')

@section('content')
<div class="body d-flex py-3">
            <div class="container-xxl">
                <div class="row g-3 mb-3 row-deck">
                    <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="card ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar lg  rounded-1 no-thumbnail bg-lightyellow color-defult"><i class="bi bi-journal-check fs-4"></i></div>
                                    <div class="flex-fill ms-4">
                                        <div class="">Total Task</div>
                                        <h5 class="mb-0 ">122</h5>
                                    </div>
                                    <a href="task.html" title="view-members" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
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
                                        <div class="">Completed Task</div>
                                        <h5 class="mb-0 ">376</h5>
                                    </div>
                                    <a href="task.html" title="space-used" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
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
                                        <div class="">Progress Task</div>
                                        <h5 class="mb-0 ">74</h5>
                                    </div>
                                    <a href="task.html" title="renewal-date" class="btn btn-link text-decoration-none  rounded-1"><i class="icofont-hand-drawn-right fs-2 "></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row End -->

                <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4 row-cols-xxl-4">
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex align-items-center">
                                <i class="icofont-data fs-3"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-0">Total Projects</h6>
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
                                    <h6 class="mb-0">Coming Projects</h6>
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
                                    <h6 class="mb-0">Progress Projects</h6>
                                    <span class="text-white">8456 Files</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-primary">
                            <div class="card-body text-white d-flex align-items-center">
                                <i class="icofont-tasks fs-3"></i>
                                <div class="d-flex flex-column ms-3">
                                    <h6 class="mb-0">Finished Projects</h6>
                                    <span class="text-white">88 Files</span>
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
                                        <h6 class="mb-0 fw-bold ">Project Information</h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="myProjectTable" class="table table-hover align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date Start</th>
                                                <th>Deadline</th>
                                                <th>Leader</th>
                                                <th>Completion</th>
                                                <th>Stage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="projects.html">Social Geek Made</a></td>
                                                <td>10-01-2021</td>
                                                <td>4 Month</td>
                                                <td><img src="assets/images/xs/avatar1.jpg" alt="Avatar" class="avatar sm  rounded-circle me-2"><a href="#">Keith</a></td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"  style="width: 78%;">78%</div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-warning">MEDIUM</span></td>
                                            </tr>
                                            <tr>
                                                <td><a href="projects.html">Practice to Perfect</a></td>
                                                <td>12-02-2021</td>
                                                <td>1 Month</td>
                                                <td><img src="assets/images/xs/avatar2.jpg" alt="Avatar" class="avatar sm rounded-circle me-2"><a href="#">Colin</a></td>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar  bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">80%</div>
                                                    </div>
                                                </td>
                                                <td><span class="badge bg-success">LOW</span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div><!-- Row End -->
            </div>
        </div>
    @endsection
