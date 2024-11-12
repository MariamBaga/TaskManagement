<!-- Ajouter un employé -->
<div class="modal fade" id="createemp" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="createprojectLabel"> Ajouter un employé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput877" class="form-label">Nom de l'employé</label>
                    <input type="text" class="form-control" id="exampleFormControlInput877" placeholder="Entrez le nom de l'employé">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput977" class="form-label">Entreprise de l'employé</label>
                    <input type="text" class="form-control" id="exampleFormControlInput977" placeholder="Entrez le nom de l'entreprise">
                </div>
                <div class="mb-3">
                    <label for="formFileMultipleoneone" class="form-label">Photo de profil de l'employé</label>
                    <input class="form-control" type="file" id="formFileMultipleoneone">
                </div>
                <div class="deadline-form">
                    <form>
                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <label for="exampleFormControlInput1778" class="form-label">ID de l'employé</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1778" placeholder="ID de l'employé">
                            </div>
                            <div class="col-sm-6">
                                <label for="exampleFormControlInput2778" class="form-label">Date d'embauche</label>
                                <input type="date" class="form-control" id="exampleFormControlInput2778">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput177" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="exampleFormControlInput177" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput277" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleFormControlInput277" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label for="exampleFormControlInput477" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput477" placeholder="Email">
                            </div>
                            <div class="col">
                                <label for="exampleFormControlInput777" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="exampleFormControlInput777" placeholder="Téléphone">
                            </div>
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col">
                                <label class="form-label">Département</label>
                                <select class="form-select" aria-label="Sélectionnez le département">
                                    <option selected>Développement Web</option>
                                    <option value="1">Gestion Informatique</option>
                                    <option value="2">Marketing</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">Poste</label>
                                <select class="form-select" aria-label="Sélectionnez le poste">
                                    <option selected>UI/UX Design</option>
                                    <option value="1">Design de site web</option>
                                    <option value="2">Développement d'application</option>
                                    <option value="3">Assurance qualité</option>
                                    <option value="4">Développement</option>
                                    <option value="5">Développement backend</option>
                                    <option value="6">Tests logiciels</option>
                                    <option value="7">Design de site web</option>
                                    <option value="8">Marketing</option>
                                    <option value="9">SEO</option>
                                    <option value="10">Autre</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea78" class="form-label">Description (facultatif)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea78" rows="3" placeholder="Ajoutez des détails supplémentaires"></textarea>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th>Permission de Projet</th>
                                <th class="text-center">Lire</th>
                                <th class="text-center">Écrire</th>
                                <th class="text-center">Créer</th>
                                <th class="text-center">Supprimer</th>
                                <th class="text-center">Importer</th>
                                <th class="text-center">Exporter</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">Projets</td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault1" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault2" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault3" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault4" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault5" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault6" checked></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tâches</td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault7" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault8" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault9" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault10" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault11" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault12" checked></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Chat</td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault13" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault14" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault15" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault16" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault17" checked></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" id="flexCheckDefault18" checked></td>
                            </tr>
                            <!-- Ajoutez d'autres sections de permissions ici si nécessaire -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Terminé</button>
                <button type="button" class="btn btn-primary">Créer</button>
            </div>
        </div>
    </div>
</div>
