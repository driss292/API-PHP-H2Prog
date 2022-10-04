<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" defer></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="formations.php">Les formations H2Prog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=PHP">PHP</a></li>
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=JavaScript">JavaScript</a></li>
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=Algorithmique">Algorithmique</a></li>
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=WordPress">WordPress</a></li>

                            <!-- <li><a class="dropdown-item" href="formationsCategorie.php?categorie=HTML/CSS">HTML/CSS</a></li>
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=SQL">SQL</a></li>
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=Bureautique">Bureautique</a></li>
                            <li><a class="dropdown-item" href="formationsCategorie.php?categorie=Analyse & Conception">Analyse & Conception</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $content ?>
    </div>

</body>

</html>