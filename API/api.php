<?php
function getFormations() {
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM formation f INNER JOIN categorie c on f.categorie_id = c.id";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    $stmt->closeCursor();
    sendJSON($formations);
}

function getFormationById($id) {
    $pdo = getConnexion();
    $req = "SELECT f.id, f.libelle, f.description, f.image, c.libelle as 'categorie' FROM formation f INNER JOIN categorie c on f.categorie_id = c.id WHERE f.id = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id", $id, PDO::PARAM_INT);

    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($formations);
}

function getConnexion() {
    return new PDO("mysql:host=localhost;dbname=fh2prog;chartset=uth8", "root", "root");
}

function sendJSON($infos) {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos, JSON_UNESCAPED_UNICODE);
}
