<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") .
    "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));


function getFormations() {
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM formation f INNER JOIN categorie c on f.categorie_id = c.id";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($formations); $i++) {
        $formations[$i]["image"] = URL . "images/cours/" . $formations[$i]["image"];
    }
    $stmt->closeCursor();
    sendJSON($formations);
}

function getFormationsByCategorie($categorie) {
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM formation f INNER JOIN categorie c on f.categorie_id = c.id WHERE c.libelle = :categorie";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":categorie", $categorie, PDO::PARAM_STR);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($formations); $i++) {
        $formations[$i]["image"] = URL . "images/cours/" . $formations[$i]["image"];
    }
    $stmt->closeCursor();
    sendJSON($formations);
}

function getFormationById($id) {
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM formation f INNER JOIN categorie c on f.categorie_id = c.id WHERE f.id = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();
    $formation = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    $formation["image"] = URL . "images/cours/" . $formation["image"];
    sendJSON($formation);
}

function getConnexion() {
    return new PDO("mysql:host=localhost;dbname=fh2prog;chartset=uth8", "root", "root");
}

function sendJSON($infos) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}
