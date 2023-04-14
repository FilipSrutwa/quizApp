<?= $this->extend('layouts/topBottom') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center mt-5">
    <form method="POST">
        <div class="form-group">
            <label for="category">Kategoria</label><br>
            <select class="form-select" name="category" id="category">
                <?php
                foreach ($foundCategories as $category) {
                    echo '<option value=' . $category['ID'] . '>' . $category['Name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="class">Klasa</label><br>
            <select class="form-select" name="class" id="class">
                <?php
                foreach ($foundClasses as $class) {
                    echo '<option value=' . $class['ID'] . '>' . $class['Name'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nazwa testu</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <button type="submit" class="btn btn-success">Zatwierdź zmiany</button>
        <a href="/ManageQuestions" class="btn btn-warning">Porzuć zmiany</a>
    </form>
</div>
<?= $this->endSection() ?>