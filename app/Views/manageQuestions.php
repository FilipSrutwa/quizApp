<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showQuestion(questionID) {
        const path = `/ManageQuestions/question/${questionID}`;
        window.location.assign(path);
    }
</script>
<div class="container-fluid">
    <div class="d-flex justify-content-center m-5">
        <a href="/ManageQuestions/addQuestion" class="btn btn-lg btn-primary">Dodaj pytanie</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Kategoria</th>
                <th scope="col">Pytanie</th>
                <th scope="col">Odpowiedź 1.</th>
                <th scope="col">Odpowiedź 2.</th>
                <th scope="col">Odpowiedź 3.</th>
                <th scope="col">Odpowiedź 4.</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($foundQuestionsWithCategories as $question) {
                echo '
                <tr onclick=showQuestion(' . $question['ID'] . ')>
                    <td>' . $question['CategoryName'] . '</td>
                    <td>' . $question['Name'] . '</td>
                    ';
                foreach ($foundAnswers as $answers) {
                    if ($answers['Question'] == $question['ID']) {
                        if ($answers['IsTrue'] == 0)
                            echo ('<td>' . $answers['Answer'] . '</td>');
                        else
                            echo ('<td class="bg-success">' . $answers['Answer'] . '</td>');
                    }
                }
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>