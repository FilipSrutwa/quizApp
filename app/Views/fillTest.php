<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <form method="POST">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Lp.</th>
                    <th scope="col">Pytanie</th>
                    <th scope="col">Odpowiedź nr 1</th>
                    <th scope="col">Odpowiedź nr 2</th>
                    <th scope="col">Odpowiedź nr 3</th>
                    <th scope="col">Odpowiedź nr 4</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $arrayNames = array('correctAnswer', 'secondAnswer', 'thirdAnswer', 'fourthAnswer');
                shuffle($arrayNames);
                $i = 1;
                foreach ($foundQuestions as $question) {
                    echo '
                <tr>
                    <td>' . $i . '</td>
                    <td>' . $question['questionName'] . '</td>';
                    $n = 0;
                    foreach ($arrayNames as $arrayName) {
                        echo '<td> 
                                <div class="form-check">';
                        if ($arrayName == 'correctAnswer')
                            echo '
                                <input class="form-check-input" type="radio" value="1" id="' . $question['questionName'] . $n . '" name="' . $question['questionName'] . '">
                                ';
                        else
                            echo '
                                <input class="form-check-input" type="radio" value="0" id="' . $question['questionName'] . $n . '" name="' . $question['questionName'] . '">
                                ';
                        echo '
                                    <label class="form-check-label" for="' . $question['questionName'] . $n . '">
                                        ' . $question[$arrayName] . '
                                    </label>
                                </div>
                        </td>';
                        $n++;
                    }

                    echo '</tr>';
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-lg btn-success mt-2">Wyślij odpowiedzi</button>
    </form>
</div>
<?= $this->endSection() ?>