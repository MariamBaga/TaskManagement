<!-- Ajouter un employé -->
<div class="modal fade" id="createemp" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createprojectLabel"> Ajouter un Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                {{-- <div class="mb-3">
                    <label for="exampleFormControlInput877" class="form-label">Nom de l'employé</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput877" placeholder="Entrez le nom de l'employé">
                </div> --}}
                {{-- <div class="mb-3">
                    <label for="exampleFormControlInput977" class="form-label">Entreprise de l'employé</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" id="exampleFormControlInput977" placeholder="Entrez le nom de l'entreprise">
                </div> --}}

                <div class="deadline-form">
                    <form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="mb-3">
                                <label for="formFileMultipleoneone" class="form-label">Photo de profil de
                                    l'utilisateur</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="formFileMultipleoneone">
                                @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="col-sm-6">
                                <label for="exampleFormControlInput1778" class="form-label">ID de l'employé</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1778" placeholder="ID de l'employé">
                            </div> --}}
                            <div class="col-sm-6 col-md-12">
                                <label for="exampleFormControlInput2778" class="form-label">Date d'embauche</label>
                                <input type="date" class="form-control @error('started_at') is-invalid @enderror"
                                    name="started_at" id="exampleFormControlInput2778">
                                @error('started_at')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput177" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="exampleFormControlInput177" placeholder="Nom d'utilisateur">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput277" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="exampleFormControlInput277" placeholder="Mot de passe">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput477" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="exampleFormControlInput477" placeholder="Email">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput777" class="form-label">Téléphone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" id="exampleFormControlInput777" placeholder="Téléphone">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label class="form-label">Département</label>
                                <select class="form-select @error('department') is-invalid @enderror" name="department"
                                    aria-label="Sélectionnez le département">
                                    <option selected>Développement Web</option>
                                    <option value="1">Gestion Informatique</option>
                                    <option value="2">Marketing</option>
                                </select>
                                @error('Department')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col">
                                <label class="form-label">Poste</label>
                                <select class="form-select @error('profile') is-invalid @enderror"
                                    aria-label="Sélectionnez le poste" name="profile">
                                    <option value="UI/UX Design" {{ old('profile') == 'UI/UX Design' ? 'selected' : '' }}>UI/UX Design</option>
                                    <option value="Design de site web {{ old('profile') == 'Design de site web' ? 'selected' : '' }}">Design de site web</option>
                                    <option value="Développement d'application" {{ old('profile') == 'UI/UX Design' ? 'selected' : '' }}>Développement d'application</option>
                                    <option value="Assurance qualité" {{ old('profile') == 'Développement d\'application' ? 'selected' : '' }}>Assurance qualité</option>
                                    <option value="Développement" {{ old('profile') == 'UI/UX Design' ? 'selected' : '' }}>Développement</option>
                                    <option value="Développement backend" {{ old('profile') == 'Développement backend' ? 'selected' : '' }}>Développement backend</option>
                                    <option value="Tests logiciels" {{ old('profile') == 'Tests logiciels' ? 'selected' : '' }}>Tests logiciels</option>
                                    <option value="Design de site web" {{ old('profile') == 'Design de site web' ? 'selected' : '' }}>Design de site web</option>
                                    <option value="Marketing" {{ old('profile') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="SEO" {{ old('profile') == 'SEO' ? 'selected' : '' }}>SEO</option>
                                    <option value="Autre" {{ old('profile') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                </select>
                                @error('profile')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea78" class="form-label">Description
                                (facultatif)</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                id="exampleFormControlTextarea78" rows="3" placeholder="Ajoutez des détails supplémentaires">{{ old('description') ?? '' }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
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
</div>
</div>
