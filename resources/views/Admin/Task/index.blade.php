@extends('main')
@section('title', 'Nouveau Tache')
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
                    <h3 class="fw-bold py-3 mb-0">Tâches</h3>
                    <div class="d-flex py-2 project-tab flex-wrap w-sm-100">
                        <button type="button" class="btn btn-dark w-sm-100" data-bs-toggle="modal"
                            data-bs-target="#createproject"><i class="icofont-plus-circle me-2 fs-6"></i>Ajouter
                            Une Tâche</button>
                        <ul class="nav nav-tabs tab-body-header rounded ms-3 prtab-set w-sm-100" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#All-list"
                                    role="tab">Tous</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Started-list"
                                    role="tab">En Révision</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Approval-list"
                                    role="tab">Encours</a></li>
                            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#Completed-list"
                                    role="tab">Terminée</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row end  -->
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 flex-column">
                <div class="tab-content mt-4">
                    {{-- all tasks list --}}
                    <div class="tab-pane fade show active" id="All-list">
                        <div class="row g-3 gy-5 py-3 row-deck">
                            @if ($tasks->count() > 0)
                                @foreach ($tasks as $task)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-2">
                                                    <div class="lesson_name">
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $task->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $task->titre }}</h6>
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
                                                </div>

                                                <p class="py-2 mb-0">{{ $task->description }}.</p>
                                                <div class="dividers-block"></div>
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
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate @if($task->statut == "encours") bg-warning @elseif($task->statut == "review") light-danger-bg @else bg-success @endif py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->statut }} </div>
                                                    </div>
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
                            @if ($tasksNeedsReview->count() > 0)
                                @foreach ($tasksNeedsReview as $task)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-2">
                                                    <div class="lesson_name">
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $task->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $task->titre }}</h6>
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
                                                </div>

                                                <p class="py-2 mb-0">{{ $task->description }}.</p>
                                                <div class="dividers-block"></div>
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
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate @if($task->statut == "encours") bg-warning @elseif($task->statut == "review") light-danger-bg @else bg-success @endif py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->statut }} </div>
                                                    </div>
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
                            @if ($tasksInProgress->count() > 0)
                                @foreach ($tasksInProgress as $task)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-2">
                                                    <div class="lesson_name">
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $task->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $task->titre }}</h6>
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
                                                </div>

                                                <p class="py-2 mb-0">{{ $task->description }}.</p>
                                                <div class="dividers-block"></div>
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
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate @if($task->statut == "encours") bg-warning @elseif($task->statut == "review") light-danger-bg @else bg-success @endif py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->statut }} </div>
                                                    </div>
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
                            @if ($tasksCompleted->count() > 0)
                                @foreach ($tasksCompleted as $task)
                                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center justify-content-between mt-2">
                                                    <div class="lesson_name">
                                                        <span class="small text-muted project_name fw-bold">
                                                            {{ $task->category }}
                                                        </span>
                                                        <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $task->titre }}</h6>
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
                                                </div>

                                                <p class="py-2 mb-0">{{ $task->description }}.</p>
                                                <div class="dividers-block"></div>
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
                                                        </ul>
                                                    </div>
                                                    <div class="col-sm text-end">

                                                        <div
                                                            class="small text-truncate @if($task->statut == "encours") bg-warning @elseif($task->statut == "review") light-danger-bg @else bg-success @endif py-1 px-2 rounded-1 d-inline-block fw-bold small">
                                                            {{ $task->statut }} </div>
                                                    </div>
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
<!-- Create task-->
<div class="modal fade" id="createproject" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title  fw-bold" id="createprojectlLabel"> Ajouter une Tâches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <!-- Task Title -->
                        <div class="mb-3">
                            <label class="form-label">Titre de la tâche</label>
                            <input type="text" name="titre"
                                class="form-control @error('titre') is-invalid @enderror"
                                value="{{ old('titre') ?? '' }}">
                            @error('titre')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Project Name -->
                        <div class="mb-3">
                            <label class="form-label">Nom du projet</label>
                            <select name="project_id" id="create_task" class="form-select @error('project_id') is-invalid @enderror">
                                <option selected disabled>Sélectionner un projet</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        {{ old('project_id') == $project->id ? 'selected' : '' }}>{{ $project->nom }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Task Description -->
                        <div class="mb-3">
                            <label class="form-label">Description (Facultatif)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3"> {{ old('desciption') ?? '' }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Task Status and Due Date -->
                        <div class="deadline-form mb-3">
                            <div class="row">
                                <div class="col">
                                    <label class="form-label">Statut de la tâche</label>
                                    <select class="form-select @error('statut') is-invalid @enderror" name="statut"
                                        id="statut">
                                        <option value="review" {{ old('statut') == 'review' ? 'selected' : '' }}>En
                                            Révision</option>
                                        <option value="encours" {{ old('statut') == 'encours' ? 'selected' : '' }}>
                                            Encours</option>
                                        <option value="complet" {{ old('statut') == 'complet' ? 'selected' : '' }}>
                                            Complet</option>
                                    </select>
                                    @error('statut')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label class="form-label">Date d'échéance</label>
                                    <input name="date_echeance" type="date"
                                        class="form-control @error('date_echeance') is-invalid @enderror"
                                        value="{{ old('date_echeance') ?? '' }}">
                                    @error('date_echeance')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Task Assign Person -->
                        <div class="mb-3">
                            <label class="form-label">Attribuer à</label>
                            <select name="user_id" class="form-select @error('user_id') is-invalid @enderror"
                                required>
                            </select>
                            @error('user_id')
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
@foreach ($tasks as $task)
    <div class="modal fade" id="editproject{{ $task->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('tasks.update', $task) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <!-- Task Title -->
                            <div class="mb-3">
                                <label class="form-label">Titre de la tâche</label>
                                <input type="text" name="titre"
                                    class="form-control @error('titre') is-invalid @enderror"
                                    value="{{ $task->titre ?? old('titre') }}">
                                @error('titre')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Project Name -->
                            <div class="mb-3">
                                <label class="form-label">Nom du projet</label>
                                <select name="project_id"
                                    class="form-select @error('project_id') is-invalid @enderror" required>
                                    <option selected disabled>Sélectionner un projet</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            {{ $project->id == $task->project_id ? 'selected' : '' }}>
                                            {{ $project->nom }}</option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Task Description -->
                            <div class="mb-3">
                                <label class="form-label ">Description (Facultatif)</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ $task->description ?? old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Task Status and Due Date -->
                            <div class="deadline-form mb-3">
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Statut de la tâche</label>
                                        <select class="form-select @error('statut') is-invalid @enderror"
                                            name="statut" id="statut">
                                            <option value="review" {{ 'review' == $task->statut ? 'selected' : '' }}>
                                                En Révision</option>
                                            <option value="encours"
                                                {{ 'encours' == $task->statut ? 'selected' : '' }}>Encours</option>
                                            <option value="complet"
                                                {{ 'complet' == $task->statut ? 'selected' : '' }}>Complet</option>
                                        </select>
                                        @error('statut')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Date d'échéance</label>
                                        <input name="date_echeance" type="date"
                                            class="form-control @error('date_echeance') is-invalid @enderror"
                                            value="{{ $task->date_echeance->format('Y-m-d') }}">
                                        @error('date_echeance')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Task Assign Person -->
                            <div class="mb-3">
                                <label class="form-label">Attribuer à</label>
                                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror"
                                    required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == $task->user_id ? 'selected' : '' }}>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endforeach
</div>
<!-- Modal  Delete Folder/ File-->
@foreach ($tasks as $task)
    <form action="{{ route('tasks.destroy', $task) }}" method="post">
        @csrf
        @method('Delete')
        <div class="modal fade" id="deleteproject{{ $task->id }}" tabindex="-1" aria-hidden="true">
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



    jQuery('select[name="project_id"]').on("change", function () {
        var project_id = jQuery(this).val();
        if (project_id) {
            jQuery.ajax({
                url: "/projects/" + project_id + "/users/",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    jQuery('select[name="user_id"]').empty();
                    $('select[name="user_id"]').append(
                        '<option value="" selected>Selectionnez</option>'
                    );
                    jQuery.each(data, function (key, value) {
                        $('select[name="user_id"]').append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.name +
                                " " +
                                "</option>"
                        );
                    });
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                },
            });
        } else {
            $('select[name="student_code"]').empty();
        }
    });
</script>
@endsection
