<?php $title = "Paramètres"; ?>
<?php ob_start(); ?>
<section class="p-5 mt-5">
    <div class="container p-5">
        <div>
            <h1 class="ref-name text-center fw-bold">Imane Sidiki</h1>
            <form class="row d-flex align-items-center" action="settings.php" method="post">
                <div class="col-7 reflow-product d-flex align-items-center py-5">
                    <div class="ref-media">
                        <div class="ref-preview"><img class="ref-image active" src="img/imane.jpg"
                                                      alt=""/></div>
                    </div>

                    <div class="ref-product-data d-flex flex-column justify-content-between">


                    </div>
                </div>
                <div class="col-5 row">
                    <div class="col-12">
                        <label class="p-2">
                            Num d'utilisateur
                            <input type="text" class="form-control m-2" value="imanesidiki">
                        </label>
                        <label class="p-2">
                            Mot de passe
                            <input type="password" class="form-control m-2" value="machkour">
                        </label>
                    </div>

                    <div class="col-12 ">
                        <div class="p-2 ">
                            <div class="center"><input type="submit" class="btn btn-primary m-2" value="Modifier les informations"></div>
                            <div class="center"><input type="submit" class="btn btn-danger m-2" value="Supprimer le compte"></div>

                        </div>


                    </div>

                </div>

            </form>

        </div>
    </div>

</section>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
