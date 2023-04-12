<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <label for="category">Kategoria</label><br>
        <select class="form-select" name="category" id="category">
            <?php
            foreach ($foundCategories as $category) {
                if ($category['ID'] == $foundQuestion['Category']) {
                    echo '
                    <option value=' . $category['ID'] . ' selected>' . $category['Name'] . '</option>
                    ';
                } else {
                    echo '
                    <option value=' . $category['ID'] . '>' . $category['Name'] . '</option>
                    ';
                }
            }
            ?>
        </select>
        <div class="form-group">
            <label for="name">Treść pytania</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $foundQuestion['Name'] ?>">
        </div>
        <?php
        $i = 1;
        foreach ($foundAnswers as $answer) {
            if ($answer['IsTrue'] == 1) {
                echo '
                <div class="form-group">
                    <label for="answer' . $i . '">Odpowiedź nr ' . $i . ' (poprawna)</label>
                    <input type="text" class="form-control bg-success" id="answer' . $i . '" name="answer' . $i . '" value="' . $answer['Answer'] . '">
                </div>
                ';
            } else {
                echo '
                <div class="form-group">
                    <label for="answer' . $i . '">Odpowiedź nr ' . $i . '</label>
                    <input type="text" class="form-control" id="answer' . $i . '" name="answer' . $i . '" value="' . $answer['Answer'] . '">
                </div>
            ';
            }
            $i++;
        }
        ?>
        <input type="hidden" name="questionID" value="<?= $foundQuestion['ID'] ?>">
        <button type="submit" class="btn btn-success">Zatwierdź zmiany</button>
        <a href="/ManageQuestions/Question/<?= $foundQuestion['ID'] ?>" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>