<?php
defined('CONTROL') or die('Acesso Inválido');

// get artista tudo sobre ele
$api = new ApiConsumer();
$paises = $api->getAllPais();
// print_r($paises);
// die();
?>

<div class="container mt-5">
    <div class="row">
        <h3 class="title_principal">Consumindo uma Api com PHP: <br><span class="fancy"> Os países do Mundo! </span> </h3>

        <?php foreach($paises as $pais): ?>
        <div class="col-auto mb-3">
        <br>
                <div class="d-flex" style="gap: 5px;">
                    <a href="?route=pais&paisnome=<?= $pais['nome'] ?>" class="button_principal"><img src="<?= $pais['bandeira'] ?>" style="height: 25px; width:25px;"> <?= " " . $pais['nome'] ?> </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>