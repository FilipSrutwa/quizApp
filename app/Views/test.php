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
        <a href="/ManageTests/duplicateTest" class="btn btn-lg btn-primary mr-4">Duplikuj test dla innej klasy</a>
        <a href="/ManageTests/addQuestionToTest/<?= $testID ?>" class="btn btn-lg btn-primary">Dodaj pytanie</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Pytanie</th>
                <th scope="col">Odpowiedź poprawna</th>
                <th scope="col">Odpowiedź nr 2</th>
                <th scope="col">Odpowiedź nr 3</th>
                <th scope="col">Odpowiedź nr 4</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundQuestions as $question) {
                echo '
                <tr onclick=showQuestion(' . $question['questionID'] . ')>
                    <td>' . $i . '</td>
                    <td>' . $question['questionName'] . '</td>
                    <td class="bg-success">' . $question['correctAnswer'] . '</td>
                    <td>' . $question['secondAnswer'] . '</td>
                    <td>' . $question['thirdAnswer'] . '</td>
                    <td>' . $question['fourthAnswer'] . '</td>
                    <td><a href="/ManageTests/dropTestQuestion/' . $testID . '?testQuestionID=' . $question['testQuestionID'] . '" class="btn btn-sm btn-danger">Usuń pytanie</a></td>
                    ';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>