<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Klasa</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($foundStudents as $student) {
                echo '
                <tr>
                    <td>' . $student['Class'] . '</td>
                    <td>' . $student['Name'] . '</td>
                    <td>' . $student['Surname'] . '</td>
                </tr>
                ';
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>