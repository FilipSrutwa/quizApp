<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $foundStudent->Name ?>">
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" id="surname" name="surname" value="<?= $foundStudent->Surname ?>">
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" value="<?= $foundStudent->Login ?>">
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="text" class="form-control" id="password" name="password" value="<?= $foundStudent->Password ?>">
        </div>
        <div class="form-group">
            <label for="class">Klasa</label>
            <select id="class" name="class" class="form-class">
                <?php
                foreach ($foundClasses as $class) {
                    if ($class['ID'] == $foundStudent->ClassID) {
                        echo '<option selected value=' . $foundStudent->ClassID . '>' . $foundStudent->Class . '</option>';
                    } else {
                        echo '
                        <option value=' . $class['ID'] . '>' . $class['Name'] . '</option>
                        ';
                    }
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="accID" value="<?= $foundStudent->ID ?>">
        <button type="submit" class="btn btn-success">Zatwierdź zmiany</button>
        <a href="/ManageStudents/student/<?= $foundStudent->ID ?>" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>