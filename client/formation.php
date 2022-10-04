<?php
$formation = json_decode(file_get_contents("http://localhost:8888/API-PHP-H2Prog/API/formation/" . $_GET["numero"]));
ob_start();
?>
<h1>Formation: <?= $formation->libelle ?></h1>
<img src="<?= $formation->image ?>" width="400px;" alt="">
<div>
    <?= $formation->description ?>
</div>
<?php
$content = ob_get_clean();
require_once("template.php");
