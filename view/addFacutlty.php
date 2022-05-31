<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<?php ob_start(); ?>
    <form id="register" action="<?= ASSETS_URL ?>index.php?action=addTeacher" class="p-3 m-5 p-xl-4" data-aos="fade-up" method="post"
          enctype="multipart/form-data">
        <div class="row">
            <div class="col mb-3">
                <label for="name" class="form-label">Nom</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>

            <div class="col mb-3">
                <label for="surname" class="form-label">Prénom</label>
                <input class="form-control" type="text" name="surname" id="surname">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="surname" class="form-label">Nom d'utilisateur</label>
                <input class="form-control" type="text" name="surname" id="surname">
            </div>

            <div class="col mb-3">
                <label for="email" class="form-label">Email</label>
                <input class="form-control" type="email" name="email" id="email">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="photos" class="form-label">Votre mot de passe</label>
                <input class="form-control" type="text" name="photos" id="photos">
            </div>

            <div class="col mb-3">
                <label for="cv" class="form-label">Confirmez votre mot de passe</label>
                <input class="form-control" type="text" name="cv" id="cv">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label for="photos" class="form-label">Photos</label>
                <input class="form-control" type="file" name="photos" id="photos">
            </div>


        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="country" class="form-label">Pays</label>
                <select id="country" name="country" class="form-select" required>

                </select>
            </div>

            <div class="col mb-3">
                <label for="city" class="form-label">Ville</label>
                <select id="city" name="numBloc" class="form-select" required>

                </select>
            </div>
            <div class="col mb-3">
                <label for="postale" class="form-label">Code Postale</label>
                <input type="number" class="form-control" id="postale" name="postale" maxlength="5">
            </div>
        </div>


        <div class="col">
            <button id="submit" class="btn btn-primary shadow d-block w-100" type="submit">
                Suivant
            </button>
        </div>


        <div class="mb-3"></div>
        <div></div>
    </form>

<?php $form = ob_get_clean(); ?>
<?php require('templates/teacher/addTeachers.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>