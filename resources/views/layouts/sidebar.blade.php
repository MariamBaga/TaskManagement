<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-5 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{{ route('dashboard') }}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <svg width="35" height="35" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                    <path
                        d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                    <path
                        d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                </svg>
            </span>
            <span class="logo-text">Mes-Tâches</span>
        </a>
        <!-- Menu: liste principale ul -->

        <ul class="menu-list flex-grow-1 mt-3">
            <li class="collapsed">
                <a class="m-link active" data-bs-toggle="collapse" data-bs-target="#dashboard-Components"
                    href="#">
                    <i class="icofont-home fs-5"></i> <span>Tableau de bord</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse show" id="dashboard-Components">
                    <li><a class="ms-link" href="#"> <span>Tableau de bord RH</span></a></li>
                    <li><a class="ms-link active" href="{{ route('dashboard') }}"> <span>Tableau de bord
                                Projet</span></a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#project-Components" href="#">
                    <i class="icofont-briefcase"></i><span>Projets</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse" id="project-Components">
                    <li><a class="ms-link" href="{{ route('projects.index') }}"><span>Projets</span></a></li>
                    <li><a class="ms-link" href="{{ route('tasks.index') }}"><span>Tâches</span></a></li>
                    <li><a class="ms-link" href="timesheet.html"><span>Feuille de temps</span></a></li>
                    <li><a class="ms-link" href="team-leader.html"><span>Chefs d'équipe</span></a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#tikit-Components" href="#"><i
                        class="icofont-ticket"></i> <span>Tickets</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse" id="tikit-Components">
                    <li><a class="ms-link" href="tickets.html"> <span>Vue des tickets</span></a></li>
                    <li><a class="ms-link" href="ticket-detail.html"> <span>Détail du ticket</span></a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#client-Components" href="#"><i
                        class="icofont-user-male"></i> <span>Nos Clients</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse" id="client-Components">
                    <li><a class="ms-link" href="ourclients.html"> <span>Clients</span></a></li>
                    <li><a class="ms-link" href="profile.html"> <span>Profil du Client</span></a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#emp-Components" href="#"><i
                        class="icofont-users-alt-5"></i> <span>Employés</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse" id="emp-Components">
                    <li><a class="ms-link" href="{{ route('employee.index') }}"> <span>Membres</span></a></li>
                    <li><a class="ms-link" href="{{ route('employeeProfile.index') }}"> <span>Profil des Membres</span></a></li>
                    <li><a class="ms-link" href="holidays.html"> <span>Congés</span></a></li>
                    <li><a class="ms-link" href="attendance-employees.html"> <span>Présence des Employés</span></a></li>
                    <li><a class="ms-link" href="attendance.html"> <span>Présence</span></a></li>
                    <li><a class="ms-link" href="leave-request.html"> <span>Demande de Congé</span></a></li>
                    <li><a class="ms-link" href="department.html"> <span>Département</span></a></li>
                    <li><a class="ms-link" href="loan.html"> <span>Prêt</span></a></li>
                </ul>
            </li>

            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#menu-Componentsone" href="#"><i
                        class="icofont-ui-calculator"></i> <span>Comptes</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse" id="menu-Componentsone">
                    <li><a class="ms-link" href="invoices.html"><span>Factures</span> </a></li>
                    <li><a class="ms-link" href="payments.html"><span>Paiements</span> </a></li>
                    <li><a class="ms-link" href="expenses.html"><span>Dépenses</span> </a></li>
                    <li><a class="ms-link" href="create-invoice.html"><span>Créer une Facture</span> </a></li>
                </ul>
            </li>
            <li class="collapsed">
                <a class="m-link" data-bs-toggle="collapse" data-bs-target="#payroll-Components" href="#"><i
                        class="icofont-users-alt-5"></i> <span>Paye</span> <span
                        class="arrow icofont-dotted-down ms-auto text-end fs-5"></span></a>
                <!-- Menu: Sous-menu ul -->
                <ul class="sub-menu collapse" id="payroll-Components">
                    <li><a class="ms-link" href="salaryslip.html"><span>Salaire des Employés</span></a></li>
                    <li><a class="ms-link" href="salaryslip-view.html"><span>Vue du Bulletin de Salaire</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
