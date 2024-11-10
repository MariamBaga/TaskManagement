<div class="modal fade" id="createtask" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="createprojectLabel">Create Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Task Title -->
                    <div class="mb-3">
                        <label class="form-label">Task Title</label>
                        <input type="text" name="titre" class="form-control" required>
                    </div>

                    <!-- Project Name -->
                    <div class="mb-3">
                        <label class="form-label">Project Name</label>
                        <select name="project_id" class="form-select" required>
                            <option selected disabled>Select Project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Task Description -->
                    <div class="mb-3">
                        <label class="form-label">Description (optional)</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <!-- Task Status and Due Date -->
                    <div class="deadline-form mb-3">
                        <div class="row">
                            <div class="col">
                                <label class="form-label">Task Status</label>
                                <input name="statut" type="date" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="form-label">Due Date</label>
                                <input name="date_echeance" type="date" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <!-- Task Assign Person -->
                    <div class="mb-3">
                        <label class="form-label">Assign To</label>
                        <select name="user_id" class="form-select" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
