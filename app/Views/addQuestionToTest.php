<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <h1>Dodaj pytanie z listy rozwijalnej</h1>
        <div class="form-group">
            <label for="questionID">Pytanie</label><br>
            <select class="form-select" id="questionID" name="questionID">
                <?php
                foreach ($questions as $question) {
                    echo '
                <option value=' . $question['ID'] . '>' . $question['Name'] . '</option>
                ';
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Dodaj pytanie</button>
        <a href="/ManageTests/test/<?= $testID ?>" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>