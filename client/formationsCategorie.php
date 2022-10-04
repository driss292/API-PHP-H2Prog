<?php
$formations = json_decode(file_get_contents("http://localhost:8888/API-PHP-H2Prog/API/formations/" . $_GET["categorie"]));
ob_start();
?>
<table class="table">
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Description</td>
        <td>Image</td>
        <td>Catégorie</td>
    </tr>
    <?php foreach ($formations as $formation) : ?>
        <tr>
            <td><?= $formation->id ?></td>
            <td><?= $formation->libelle ?></td>
            <td><?= $formation->description ?></td>
            <td><img src="<?= $formation->image ?>" width="100px;"></td>
            <td><?= $formation->categorie ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$content = ob_get_clean();
require_once("template.php");
