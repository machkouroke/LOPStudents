<?php
	$title = "Liste étudiant";
	$instructions = "Filières et modules enseigné"
?>
<?php ob_start(); ?>

<?php require('templates/teacher/formTemplate.php'); ?>
<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>