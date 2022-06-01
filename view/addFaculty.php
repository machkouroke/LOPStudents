<?php
	$title = "Liste étudiant";
	$instructions = "Fillières et modules enseigné"
?>
<?php ob_start(); ?>
<?php ob_start(); ?>
<?php
	$faculties = ['API 1', 'API 2', 'IID 1', 'IID 2', 'IID 3', 'GI 1', 'GI 2', 'GI 3', 'GE 1', 'GE 2', 'GE 3',
			'GPEE 1', 'GPEE 2', 'GPEE 3', 'IRIC 1', 'GRT 2', 'GRT 3'];
?>
	<form id="register" action="<?= ASSETS_URL ?>index.php?action=addTeacher" class="px-5 mx-5 p-xl-4" data-aos="fade-up"
	      method="post"
	      enctype="multipart/form-data">
		<div class="row">
			<?php
				$col = 0;
				foreach ($faculties as $faculty): ?>
					<div class="faculty d-flex justify-content-between col-md-3 col-lg-4 col-12 mb-3 row">
						<div class=" d-flex align-items-center p-3 justify-content-between col-4 w-100">
							<label for="<?=$faculty?>" class="form-check-label"><?=$faculty?></label>
							<input value="<?=$faculty?>" id="<?=$faculty?>" class=" form-check-input" type="checkbox" name="check_list[]" >
						</div>
						<div class="col w-100">
							<input  id="<?=$faculty?>" class="form-control w-50 <?=$faculty?>" type="text" name="check_list[]" readonly>
						</div>
					</div>
				<?php endforeach; ?>
			<div class="row d-flex justify-content-center  p-4">
				<button id="submit" class="btn btn-primary shadow d-block w-50 " type="submit">
					Finaliser l'ajout
				</button>
			</div>
		</div>


	</form>
	<script src="<?= JS_URL ?>facultyChoice.js"></script>

<?php $form = ob_get_clean(); ?>
<?php require('templates/teacher/addTeachers.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>