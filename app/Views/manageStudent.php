<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center">
    <div class="flex-column mt-5">
        <span class="border border-primary d-flex flex-column justify-content-center p-5 align-items-center">
            <img src="/assets/pictures/acc.png" class="img-fluid profile-image-pic img-thumbnail mt-1 mb-3" width="200px" alt="profile">
            <h1>Imię i nazwisko: <?= $foundStudent->Name . ' ' . $foundStudent->Surname ?></h1>
            <h2>Login: <?= $foundStudent->Login ?></h2>
            <h2>Hasło: <?= $foundStudent->Password ?></h2>
        </span>
        <div class="d-flex justify-content-center mt-2">
            <a href="/ManageStudents/EditStudent/<?= $foundStudent->ID ?>" class="btn btn-primary btn-lg mr-5" style="width:fit-content !important;">Edytuj profil</a>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" style="width:fit-content !important;">Usuń profil</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy na pewno usunąć użytkownika?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Spowoduje to usunięcie go na zawsze - to bardzo długo!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                <a href="/ManageStudents/DropStudent/<?= $foundStudent->ID ?>" class="btn btn-danger">Tak</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>