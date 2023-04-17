<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!--Dla nauczyciela-->
    <?php
    if (session_status() === PHP_SESSION_NONE)
        session_start();
    if ($_SESSION['loginType'] == 1)
        echo '
    <h1 style="text-align:center;">Zapraszamy do korzystania z górnego paska w celu poruszania się po aplikacji</h1>';
    ?>

    <!--Dla ucznia dodaj kafelki z nierozwiązanymi testami-->
    <?php
    if (session_status() === PHP_SESSION_NONE)
        session_start();
    if ($_SESSION['loginType'] == 2)
        foreach ($testsToDo as $test) {
            echo '
        <div class="d-flex flex-row flex-wrap mt-5">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">' . $test['Name'] . '</h5>
                <p class="card-text">Utworzono dnia: ' . $test['Created_at'] . '</p>
                <a href="/DoTest/FillTest/' . $test['ID'] . '" class="btn btn-primary">Wypełnij test</a>
            </div>
        </div>
    </div>
        ';
        }
    ?>

</div>
<?= $this->endSection() ?>