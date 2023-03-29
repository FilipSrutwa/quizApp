<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" id="surname" name="surname">
        </div>
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login">
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="text" class="form-control" id="password" name="password">
        </div>
        <div class="form-group">
            <label for="class">Klasa</label>
            <select id="class" name="class" class="form-class">
                <?php
                foreach ($foundClasses as $class) {
                    echo '
                        <option value=' . $class['ID'] . '>' . $class['Name'] . '</option>
                        ';
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="accType" value=2>
        <button type=" submit" class="btn btn-success">Dodaj</button>
        <a href="/ManageStudents" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>