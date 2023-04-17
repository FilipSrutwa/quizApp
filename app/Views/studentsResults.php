<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Nazwa testu</th>
                <th scope="col">Imię i nazwisko studenta</th>
                <th scope="col">Zdobyte punkty</th>
                <th scope="col">Max punktów</th>
                <th scope="col">Wynik w procentach</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundResults as $test) {
                echo '
                <tr>
                    <td>' . $i . '</td>
                    <td>' . $test['TestName'] . '</td>
                    <td>' . $test['StudentName'] . ' ' . $test['StudentSurname'] . '</td>
                    <td>' . $test['Points'] . '</td>
                    <td>' . $test['Max_Points'] . '</td>
                    <td>' . ($test['Points'] / $test['Max_Points']) * 100 . ' %</td>
                    <td>
                        <div>
                            <a href="/StudentsResults/DropResult/' . $test['ID'] . '" class="btn btn-sm btn-danger">Usuń wynik</a>
                            <a href="/ManageTests/Test/' . $test['ID'] . '" class="btn btn-sm btn-success">Zobacz test</a>
                        <div>
                    </td>
                    ';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>