<h1 class="py-5 ref-heading text-center fw-bold">Liste des étudiants </h1>
<div class="d-flex flex-row justify-content-between align-items-center">

	<p>
		<button id="moreButton" class="btn btn-primary">Plus d'option</button>
	</p>

	<p><a href="<?= $switchPage ?>"><img src="assets/img/<?= $switchIcon ?>" alt="" class="switch"></a>
	</p>
	<p><a href="#" class="btn btn-primary">Envoyer un mail</a></p>
</div>
<div id="moreOption" data-aos="fade-down" class="row bg-primary-gradient rounded p-3">
	<div class="reflow-product-list ref-cards">
		<div class="m-3 ref-products align-items-cente justify-content-around">
			<div class="ref-product" href="add.php?title=de l'étudiant">
				<div class="front">
					<img class="ref-image" src="assets/img/listingMenu/city.png" alt=""/>
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
					<img class="ref-image" src="assets/img/listingMenu/year.png" alt=""/>
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
					<img class="ref-image" src="assets/img/listingMenu/faculty.png" alt=""/>
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