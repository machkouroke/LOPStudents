<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
    <div class="container py-5">
        <div class="row mb-4 mb-lg-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <p class="fw-bold text-success mb-2"> </p>

                <h2 class="fw-bold">Liste des étudiants </h2>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 mx-auto" style="max-width: 700px;">
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/team/avatar4.jpg?h=13fcb1a3bcb58463519bc5974513259b">
                    <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                    <p class="text-muted mb-2">Erat netus</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/team/avatar6.jpg?h=2e370993414f997a8e71bc0d6b57b9bd">
                    <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                    <p class="text-muted mb-2">Erat netus</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/team/avatar5.jpg?h=3c112678b7e2b1881f0b09da11f0e1e7">
                    <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                    <p class="text-muted mb-2">Erat netus</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/team/avatar3.jpg?h=d00658bdbe17fa68ec776823ea82e9c1">
                    <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                    <p class="text-muted mb-2">Erat netus</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/team/avatar1.jpg?h=fc3130ca16c6d3ee2009fd4450b80205">
                    <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                    <p class="text-muted mb-2">Erat netus</p>
                </div>
            </div>
            <div class="col mb-4">
                <div class="text-center"><img class="rounded mb-3 fit-cover" width="150" height="150" src="assets/img/team/avatar2.jpg?h=7086b181e9fb853914a2cca97301c640">
                    <h5 class="fw-bold mb-0"><strong>John Smith</strong></h5>
                    <p class="text-muted mb-2">Erat netus</p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
