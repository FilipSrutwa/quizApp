<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Nazwa testu</th>
                <th scope="col">Zebrane punkty</th>
                <th scope="col">Max punktów</th>
                <th scope="col">Wynik w procentach</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($foundResults as $result) {
                echo '
                <tr>
                    <td>' . $i . '</td>
                    <td>' . $result['Name'] . '</td>
                    <td>' . $result['Points'] . '</td>
                    <td>' . $result['MaxPoints'] . '</td>
                    <td>' . ($result['Points'] / $result['MaxPoints']) * 100 . ' %</td>
                    ';
                echo '</tr>';
                $i++;
            }
            ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>