<h1 class="py-5 ref-heading text-center fw-bold"><?= $title ?> </h1>
<div class="d-flex flex-column  flex-md-row justify-content-between align-items-center">

	<p>
		<button id="moreButton" class="btn btn-primary">Plus d'option</button>
	</p>

	<p>
		<a id="switchIcon"><img src="<?= $switchIcon ?>" alt="" class="switch"></a>
	</p>
	<p><input form="MessageSender" type="submit" class="btn btn-primary" value="Envoyer un mail"/> </p>
	<form id="MessageSender" method="post" action="<?= BASE_URL ?>index.php?action=sendMessage" class="d-none">
	</form>
</div>
<div id="moreOption" data-aos="fade-down" class="row shadow rounded p-3">
	<div class="reflow-product-list ref-cards">
		<div class="m-3 ref-products align-items-center justify-content-around">
			<div class="ref-product" href="add.php?title=de l'étudiant">
				<div class="front">
					<img class="ref-image" src="<?= IMG_URL ?>listingMenu/city.png" alt=""/>
					<div class="ref-product-data">
						<h5 class="ref-name text-center w-100">Sélectionner les étudiants par ville</h5>
					</div>
				</div>
				<div class="back  d-flex justify-content-center align-items-center">
					<label class="form-label ">
						<input type="text" class="form-control">
						<button class="btn btn-primary w-100 my-3" type="submit">
							Filtrer
						</button>
					</label>
				</div>
			</div>
			<div class="ref-product " href="add.php?title=de l'étudiant">
				<div class="front">
					<img class="ref-image" src="<?= IMG_URL ?>listingMenu/year.png" alt=""/>
					<div class="ref-product-data">
						<h5 class="ref-name text-center w-100">Sélectionner les étudiants par âge</h5>
					</div>
				</div>
				<div class=" back d-flex justify-content-center align-items-center">
					<label class="form-label ">
						<input type="text" class="form-control">
						<button class="btn btn-primary w-100 my-3" type="submit">
							Filtrer
						</button>
					</label>
				</div>
			</div>
			<div class="ref-product " href="add.php?title=de l'étudiant">
				<div class="front">
					<img class="ref-image" src="<?= IMG_URL ?>listingMenu/faculty.png" alt=""/>
					<div class="ref-product-data">
						<h5 class="ref-name text-center w-100">Sélectionner les étudiants par filière</h5>
					</div>
				</div>
				<div class="back  d-flex justify-content-center align-items-center">
					<label class="form-label ">
						<input type="text" class="form-control">
						<button class="btn btn-primary w-100 my-3" type="submit">
							Filtrer
						</button>
					</label>
				</div>
			</div>


		</div>
	</div>
</div>