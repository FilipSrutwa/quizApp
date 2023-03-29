<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showStudent(studentID) {
        const path = `/ManageStudents/student/${studentID}`;
        window.location.assign(path);
    }
</script>
<div class="container-fluid">
    <div class="d-flex justify-content-center m-5">
        <a href="/ManageStudents/addStudent" class="btn btn-lg btn-primary">Dodaj studenta</a>
    </div>

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
                <tr onclick=showStudent(' . $student['ID'] . ')>
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