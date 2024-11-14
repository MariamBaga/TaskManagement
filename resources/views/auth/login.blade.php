<!doctype html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ma-Tâche - Connexion</title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/my-task.style.min.css">
</head>

<body data-mytask="theme-indigo">
    <div id="mytask-layout">
        <div class="main p-2 py-3 p-xl-5">
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">
                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
                                <img src="{{ asset('assets/images/logoTaskerate.jpeg') }}" alt="Logo Taskerate" width="120"
                                height="120">
                                </div>
                                <h2 class="color-900 text-center">Taskerate - Gérons Mieux Ensemble</h2>
                                <img src="../assets/images/login-img.svg" alt="login-img">
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 bg-dark text-light" style="max-width: 32rem;">
                                <form method="POST" action="{{ route('login') }}" class="row g-1 p-3 p-md-4">
                                    @csrf
                                    <div class="col-12 text-center mb-1 mb-lg-5">
                                        <h1>Connexion</h1>
                                        <span>Accès gratuit à notre tableau de bord.</span>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="email">Adresse e-mail</label>
                                            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="nom@exemple.com" required autofocus>
                                            @error('email') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label" for="password">Mot de passe</label>
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="***************" required>
                                            @error('password') <span class="text-danger mt-2">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                            <label class="form-check-label" for="remember_me">Se souvenir de moi</label>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">SE CONNECTER</button>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <span class="text-muted">Vous n'avez pas encore de compte ? <a href="{{ route('register') }}" class="text-secondary">Inscrivez-vous ici</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- Fin de la ligne -->
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bundles/libscripts.bundle.js"></script>
</body>

</html>
