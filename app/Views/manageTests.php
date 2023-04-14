<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<script>
    function showTest(testID) {
        const path = `/ManageTests/test/${testID}`;
        window.location.assign(path);
    }
</script>
<div class="container-fluid">
    <div class="d-flex justify-content-center m-5">
        <a href="/ManageTests/addTest" class="btn btn-lg btn-primary">Dodaj test</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Nazwa testu</th>
                <th scope="col">Klasa</th>
                <th scope="col">Kategoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundTests as $test) {
                echo '
                <tr onclick=showTest(' . $test['ID'] . ')>
                    <td>' . $i . '</td>
                    <td>' . $test['Name'] . '</td>
                    <td>' . $test['Class'] . '</td>
                    <td>' . $test['Category'] . '</td>
                    ';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>