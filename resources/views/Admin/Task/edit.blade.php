<div class="modal fade" id="editproject{{ $project->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createprojectLabel">Créer une tâche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Task Title -->
                <div class="mb-3">
                    <label class="form-label">Titre de la tâche</label>
                    <input type="text" name="titre" class="form-control" required>
                </div>

                <!-- Project Name -->
                <div class="mb-3">
                    <label class="form-label">Nom du projet</label>
                    <select name="project_id" class="form-select" required>
                        <option selected disabled>Sélectionner un projet</option>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Task Description -->
                <div class="mb-3">
                    <label class="form-label">Description (Facultatif)</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                <!-- Task Status and Due Date -->
                <div class="deadline-form mb-3">
                    <div class="row">
                        <div class="col">
                            <label class="form-label">Statut de la tâche</label>
                            <select class="form-select" name="statut" id="statut">
                                <option value="review">Review</option>
                                <option value="encours">Encours</option>
                                <option value="complet">Complet</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">Date d'échéance</label>
                            <input name="date_echeance" type="date" class="form-control" required>
                        </div>
                    </div>
                </div>

                <!-- Task Assign Person -->
                <div class="mb-3">
                    <label class="form-label">Attribuer à</label>
                    <select name="user_id" class="form-select" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>
        </div>
    </div>
</div>
