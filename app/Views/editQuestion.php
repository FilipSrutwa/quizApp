<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="category">Kategoria</label>
            <input type="text" class="form-control" id="category" name="category" value="<?= $foundQuestion['Name'] ?>">
        </div>
        <div class="form-group">
            <label for="name">Treść pytania</label>
            <input type="password" class="form-control" id="name" name="name" value="">
        </div>
        <div class="form-group">
            <label for="correctAnswer">Odpowiedź nr 1 (poprawna)</label>
            <input type="text" class="form-control bg-success" id="correctAnswer" name="correctAnswer" value="">
        </div>
        <div class="form-group">
            <label for="secondAnswer">Odpowiedź nr 2</label>
            <input type="text" class="form-control" id="secondAnswer" name="secondAnswer" value="">
        </div>
        <div class="form-group">
            <label for="thirdAnswer">Odpowiedź nr 3</label>
            <input type="text" class="form-control" id="thirdAnswer" name="thirdAnswer" value="">
        </div>
        <div class="form-group">
            <label for="fourthAnswer">Odpowiedź nr 4</label>
            <input type="text" class="form-control" id="fourthAnswer" name="fourthAnswer" value="">
        </div>
        <input type="hidden" name="questionID" value="<?= $foundQuestion['ID'] ?>">
        <button type="submit" class="btn btn-success">Zatwierdź zmiany</button>
        <a href="/ManageQuestions/Question/<?= $foundQuestion['ID'] ?>" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>