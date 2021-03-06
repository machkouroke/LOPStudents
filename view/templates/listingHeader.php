<h1 class="py-5 ref-heading text-center fw-bold"><?= $title ?> </h1>
<div class="d-flex flex-column  flex-md-row justify-content-between align-items-center">

	<?php if (ADMIN_ONLY && $title==LIST_OF_STUDENTS): ?>
		<p>
			<button id="moreButton" class="btn btn-primary">Plus d'option</button>
		</p>
	<?php endif; ?>

	<p>
		<a id="switchIcon"><img src="<?= $switchIcon ?>" alt="" class="switch"></a>
	</p>
	<p><input form="MessageSender" type="submit" class="btn btn-primary" value="Envoyer un mail"/></p>
	<form id="MessageSender" method="post" action="<?= BASE_URL ?>index.php?action=sendMessage" class="d-none">
	</form>
</div>
<?php if (ADMIN_ONLY && $title==LIST_OF_STUDENTS): ?>
	<div id="moreOption" data-aos="fade-down" class="row shadow rounded p-3">
		<div class="reflow-product-list ref-cards">
			<div class="m-3 ref-products align-items-center justify-content-around">
				<form class="ref-product" action="<?= BASE_URL ?>index.php?action=studentByCity&page=1" method="post">
					<div class="front">
						<img class="ref-image" src="<?= IMG_URL ?>listingMenu/city.png" alt=""/>
						<div class="ref-product-data">
							<h5 class="ref-name text-center w-100">Sélectionner les étudiants par ville</h5>
						</div>
					</div>
					<div class="back  d-flex justify-content-center align-items-center">
						<label class="form-label ">
							<input name="city" type="text" class="form-control">
							<button class="btn btn-primary w-100 my-3" type="submit">
								Filtrer
							</button>
						</label>
					</div>
				</form>
				<form class="ref-product " method="post" action='<?= BASE_URL ?>index.php?action=studentByYear&page=1'>
					<div class="front">
						<img class="ref-image" src="<?= IMG_URL ?>listingMenu/year.png" alt=""/>
						<div class="ref-product-data">
							<h5 class="ref-name text-center w-100">Sélectionner les étudiants par âge</h5>
						</div>
					</div>
					<div class=" back d-flex justify-content-center align-items-center">
						<label class="form-label ">
							<input name='year' type="text" class="form-control">
							<button class="btn btn-primary w-100 my-3" type="submit">
								Filtrer
							</button>
						</label>
					</div>
				</form>

				<form class="ref-product " method='post' href="add.php?title=de l'étudiant"
				      action='<?= BASE_URL ?>index.php?action=studentByFaculty&page=1'>
					<div class="front">
						<img class="ref-image" src="<?= IMG_URL ?>listingMenu/faculty.png" alt=""/>
						<div class="ref-product-data">
							<h5 class="ref-name text-center w-100">Sélectionner les étudiants par filière</h5>
						</div>
					</div>
					<div class="back  d-flex justify-content-center align-items-center">
						<label class="form-label ">
							<select  id='faculty' name='faculty' class='form-select' required>

								<?php /** @var Array $faculties */
									foreach ($faculties as $faculty): ?>

									<?php
									if (isset($userToUpdate)) {
										$facultyOfUser = $userToUpdate->getFaculty() . ' ' .
												$userToUpdate->getFacultyYear();
									} ?>

									<option value="<?= $faculty ?>"
											<?= isset($userToUpdate) && $facultyOfUser === $faculty ? 'selected="' . $facultyOfUser . '"' : '' ?>><?= $faculty ?></option>
								<?php endforeach; ?>
							</select>
							<button class="btn btn-primary w-100 my-3" type="submit">
								Filtrer
							</button>
						</label>
					</div>
				</form>


			</div>
		</div>
	</div>
<?php endif ?>