<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!--Dla nauczyciela-->
    <?php
    if ($_SESSION['loginType'] == 1)
        echo '
    <h1 style="text-align:center;">Zapraszamy do korzystania z górnego paska w celu poruszania się po aplikacji</h1>';
    ?>

    <!--Dla ucznia dodaj kafelki z nierozwiązanymi testami-->
</div>
<?= $this->endSection() ?>