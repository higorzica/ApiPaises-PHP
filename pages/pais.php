<?php
defined('CONTROL') or die('Acesso Inválido');

// get artista tudo sobre ele
$api = new ApiConsumer();
$nomePais = $_GET['paisnome'] ?? null;
$string = $nomePais;
$pattern = '/ /i';
$nomePaisAlterado = preg_replace($pattern, '%20', $string);
// var_dump($nomePaisAlterado);
// die();

if (!$nomePais) {
    header('Location: ?route=home');
    die();
}

$pais_data = $api->getPais($nomePaisAlterado);
// var_dump($pais_data);
// die();
?>
    <div class="container mt-5">
    <div class="d-flex">
        <div class="card p-2 shadow">
            <img src="<?= $pais_data[0]['flags']['png'] ?>">
        </div>
        <div class="ms-5 align-self-center">
            <p class="display-3"><strong><?= $pais_data[0]['name']['common'] ?></strong></p>
            <p class="p-0 m-0">Capital:</p>
            <h4 class="p-0 m-0"><?= $pais_data[0]['capital'][0] ?></h4>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <p>Região:<br><strong><?= $pais_data[0]['region'] ?></strong></p>
            <p>Sub-região:<br><strong><?= $pais_data[0]['subregion'] ?></strong></p>
            <p>População:<br><strong><?= $pais_data[0]['population'] ?></strong> habitantes</p>
            <p>Área:<br><strong><?= $pais_data[0]['area'] ?></strong> km<sup>2</sup></p>
        </div>
    </div>

    <div>
        <a href="?route=home" class="btn btn-primary px-5">Voltar</a>
    </div>

