<?php
require_once("api.php");
//www.monsite.fr/formations
//www.
//www.monsite.fr/formations/:categorie  => (PHP,JavaScript,...)
//www.monsite.fr/formation/:id  => (1,2,3,...)

try {
    if (!empty($_GET["demande"])) {
        $url = explode("/", filter_var($_GET["demande"], FILTER_SANITIZE_URL));
        switch ($url[0]) {
            case "formations":
                if (empty($url[1])) {
                    getFormations();
                } else {
                    getFormationsByCategorie($url[1]);
                }
                break;
            case "formation":
                if (!empty($url[1])) {
                    getFormationById($url[1]);
                } else {
                    throw new Exception("Veulliez renseigner le numéro de la formation");
                }
                break;
            default:
                throw new Exception("La demande n'est pas valide, vérifiez l'url");
        }
    } else {
        throw new Exception("Problème de récupération des données");
    }
} catch (Exception $e) {
    $erreur = [
        "message" => $e->getMessage(),
        "code" => $e->getCode()
    ];
    print_r($erreur);
}
