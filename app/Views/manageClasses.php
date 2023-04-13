<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showClass(studentID) {
        const path = `/ManageClasses/Class/${classID}`;
        window.location.assign(path);
    }
</script>
<div class="container-fluid">
    <div class="d-flex justify-content-center m-5">
        <a href="/ManageClasses/addClass" class="btn btn-lg btn-primary">Dodaj klasę</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Klasa</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundClasses as $class) {
                echo '
                <tr onclick=showClass(' . $class['ID'] . ')>
                    <td>' . $i . '</td>
                    <td>' . $class['Name'] . '</td>
                    <td>
                        <a href="/ManageClasses/dropClass/' . $class['ID'] . '" class="btn btn-sm btn-danger">Usuń</a>
                        <a href="/ManageClasses/editClass/' . $class['ID'] . '" class="btn btn-sm btn-warning">Edytuj</a>
                    </td>
                </tr>
                ';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>