<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center">
    <div class="flex-column mt-5">
        <span class="border border-primary d-flex flex-column justify-content-center p-5 align-items-center">
            <img src="/assets/pictures/acc.png" class="img-fluid profile-image-pic img-thumbnail mt-1 mb-3" width="200px" alt="profile">
            <h1>Imię i nazwisko: <?= $name . ' ' . $surname ?></h1>
            <h2>Login: <?= $login ?></h2>
        </span>
        <a href="/ManageAccount/EditAccount" class="btn btn-primary btn-lg" style="width:fit-content !important;">Edytuj profil</a>
    </div>
</div>
<?= $this->endSection() ?>