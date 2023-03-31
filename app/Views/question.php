<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<div class="container d-flex justify-content-center">
    <div class="flex-column mt-5">
        <span class="d-flex flex-column justify-content-center p-5 align-items-center">
            <h1>Pytanie: <?= $foundQuestion['Name'] ?></h1>
            <?php
            $i = 1;
            foreach ($foundAnswers as $answer) {
                if ($answer['IsTrue'] == 1)
                    echo '<h2 class="border border-success">Odpowiedź nr ' . $i . ': ' . $answer['Answer'] . '</h2>';
                else
                    echo '<h2>Odpowiedź nr ' . $i . ': ' . $answer['Answer'] . '</h2>';
                $i++;
            }
            ?>
        </span>
        <div class="d-flex justify-content-center mt-2">
            <a href="/ManageQuestions/EditQuestion/<?= $foundQuestion['ID'] ?>" class="btn btn-primary btn-lg mr-5" style="width:fit-content !important;">Edytuj pytanie</a>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" style="width:fit-content !important;">Usuń pytanie</button>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Czy na pewno usunąć pytanie?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Spowoduje to usunięcie go na zawsze - to bardzo długo!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Nie</button>
                <a href="/ManageQuestions/DropQuestion/<?= $foundQuestion['ID'] ?>" class="btn btn-danger">Tak</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>