<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" id="login" name="login" value="<?= $login ?>">
        </div>
        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= $password ?>">
        </div>
        <div class="form-group">
            <label for="name">Imię</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
        </div>
        <div class="form-group">
            <label for="surname">Nazwisko</label>
            <input type="text" class="form-control" id="surname" name="surname" value="<?= $surname ?>">
        </div>
        <input type="hidden" name="accID" value="<?= $ID ?>">
        <button type="submit" class="btn btn-success">Zatwierdź zmiany</button>
        <a href="/ManageAccount" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>