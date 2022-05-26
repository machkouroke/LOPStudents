<?php $title = "Liste étudiant"; ?>
<?php ob_start(); ?>
<section class="py-5 mt-5">
	<div class="container py-5">
		<div class="row mx-auto" style="/*max-width: 700px;*/">
			<div class="col">
				<div data-reflow-type="shopping-cart">
					<div class="reflow-shopping-cart">

						<div class="ref-cart" style="display: block;">
							<h1 class="ref-heading text-center">Liste des étudiants</h1>
							<div class="d-flex flex-row justify-content-between align-items-center">
								<div class="row bg-primary-gradient rounded p-3">
									<div class="col-12">
										<label class="form-label text-center w-100" for="choice">
											<b>Vouliez vous un listing plus précis ?</b>
										</label>
										<select id="choice" name="choice" class="form-select"  required>
											<option value="1" selected>Étudiants d'une filière données</option>
											<option value="2">Étudiants d'un âge données</option>
											<option value="3">Étudiants d'une ville données</option>

										</select>
									</div>
									<div class="col-12  rounded m-2">
										<label class="form-label p-2" for="filter">

										</label>
										<input id="filter" type="text" class="center form-control" placeholder="Nom du proffesseur">
										<div class="text-center"><a href="" class="btn btn-primary m-3 ">Filtrer</a></div>
									</div>

								</div>
								<div>

								</div>
								<p><a href="#" class="btn btn-primary">Envoyer un mail</a></p>
							</div>
							<div class="ref-th my-5">
								<div class="ref-student-col">Etudiant</div>
								<div class="ref-username-col">Nom d'utilisateur</div>
								<div class="ref-email-col">Email</div>
								<div class="ref-adress-col">Adresse</div>
								<div class="ref-tel-col">Numéro de téléphone</div>
								<div class="ref-cv-col">CV</div>
								<div class="ref-action-col">Actions</div>
							</div>
							<div class="ref-cart-table">
								<div class="ref-student">
									<div class="ref-student-col">
										<div class="ref-student-wrapper"><img class="ref-student-photo"
										                                      src="img/imane.jpg"
										                                      alt="Bailee Jast"/>
											<div class="ref-student-data">
												<div class="ref-student-info">
													<div class="ref-student-name">Imane Sidiki</div>
													<div class="ref-student-category">IID1</div>
													<div class="ref-student-variants"></div>
													<div class="ref-student-personalization-holder"></div>
												</div>
												<div class="ref-student-price"></div>
											</div>
										</div>

									</div>
									<div class="ref-username-col">
										sidikiimane
									</div>
									<div class="ref-email-col">
										imanesidiki@gmail.com
									</div>
									<div class="ref-adress-col">
										<b>Firdaws, Khouribga 25000</b>
									</div>
									<div class="ref-tel-col">+2126388646641</div>
									<div class="d-flex flex-column  ref-cv-col"><a href="" >Télécharger le CV</a></div>
									<div class="d-flex flex-column  ref-action-col">
										<p><a href="" class="">Modifier</a></p>
										<p><a href="" class="">Supprimer</a></p>

									</div>
								</div>

							</div>
							<div class="ref-cart-table">
								<div class="ref-student">
									<div class="ref-student-col">
										<div class="ref-student-wrapper"><img class="ref-student-photo"
										                                      src="img/imane.jpg"
										                                      alt="Bailee Jast"/>
											<div class="ref-student-data">
												<div class="ref-student-info">
													<div class="ref-student-name">Imane Sidiki</div>
													<div class="ref-student-category">IID1</div>
													<div class="ref-student-variants"></div>
													<div class="ref-student-personalization-holder"></div>
												</div>
												<div class="ref-student-price"></div>
											</div>
										</div>

									</div>
									<div class="ref-username-col">
										sidikiimane
									</div>
									<div class="ref-email-col">
										imanesidiki@gmail.com
									</div>
									<div class="ref-adress-col">
										<b>Firdaws, Khouribga 25000</b>
									</div>
									<div class="ref-tel-col">+2126388646641</div>
									<div class="d-flex flex-column  ref-cv-col"><a href="" >Télécharger le CV</a></div>
									<div class="d-flex flex-column  ref-action-col">
										<p><a href="" class="">Modifier</a></p>
										<p><a href="" class="">Supprimer</a></p>

									</div>
								</div>

							</div>

						</div>
						<div class="ref-checkout" style="display: none;">
							<div class="ref-checkout-content">
								<form class="ref-details">
									<div class="ref-back">← Back to Cart</div>
									<div class="ref-heading">Customer Details</div>
									<label><span>Email</span><input id="ref-field-email" class="ref-form-control"
									                                type="email" name="email" value required
									                                data-state-src="email"/>
										<div class="ref-validation-error"></div>
									</label><label><span>Phone</span><input id="ref-field-phone"
									                                        class="ref-form-control" type="tel"
									                                        name="phone" value
									                                        pattern="[0-9\+\- ]{5,30}"
									                                        placeholder="+1234567890" required
									                                        data-state-src="phone"/>
										<div class="ref-validation-error"></div>
									</label>
									<div class="ref-shipping-address-holder"></div>
									<div class="ref-tax-note"><label class="ref-checkbox"><input
													id="ref-field-have-tax-exemption" class="ref-form-control"
													type="checkbox"/><span></span></label>
										<div class="ref-tax-exemption-fields"><label
													class="ref-tax-exemption-file"><span></span><input
														id="ref-field-exemption-file" class="ref-form-control"
														type="file" name="tax-exemption-file"
														accept=".doc,.docx,.pdf,.jpg,.jpeg,.png" required/>
												<div class="ref-validation-error"></div>
											</label><label class="ref-tax-exemption-text"><span></span><input
														id="ref-field-exemption-text" class="ref-form-control"
														type="text" name="tax-exemption-text" required
														data-state-src="tax-text"/>
												<div class="ref-validation-error"></div>
											</label></div>
									</div>
									<hr/>
									<label class="ref-field-collapsible ref-note-to-seller"><span
												class="ref-field-toggle">Note to Seller</span><textarea
												id="ref-field-note-seller" class="ref-form-control"
												name="note-to-seller" row="4" maxlength="1000"
												placeholder="If you have any specific instructions you want to give to the seller, write them here."
												data-state-src="note"></textarea>
										<div class="ref-validation-error"></div>
									</label>
									<hr/>
									<label class="ref-accept-terms"></label>
									<div class="ref-button ref-next">Next</div>
								</form>
								<div class="ref-shipping-payment">
									<div class="ref-back">← Back to Details</div>
									<div class="ref-heading">Shipping &amp; Payment</div>
									<div class="ref-express">
										<div class="ref-paypal-button-holder"></div>
										<span>Express Checkout</span>
									</div>
									<div class="ref-standard">
										<form class="ref-shipping-form">
											<div class="ref-heading-small">Shipping Address</div>
											<div class="ref-shipping-address-holder"></div>
											<label class="ref-checkbox ref-billing-checkbox"><input
														id="ref-field-billing-same-shipping" type="checkbox"/><span>Billing address same as shipping</span></label>
											<fieldset class="ref-billing-address" disabled>
												<div class="ref-heading-small">Billing Address</div>
												<div class="ref-billing-address-holder"></div>
											</fieldset>
											<div class="ref-heading-shipping-methods ref-heading-small">Shipping
											                                                            Method
											</div>
											<div class="ref-shipping-methods ref-error-parent"></div>
										</form>
										<div>
											<div class="ref-heading-small">Payment</div>
											<div class="ref-standard-payment-buttons"></div>
										</div>
									</div>
								</div>
								<div class="ref-instructions">
									<div class="ref-heading ref-payment-method-name"></div>
									<div class="ref-payment-method-instructions"></div>
								</div>
								<div class="ref-links"></div>
							</div>
							<div class="ref-checkout-summary">
								<div class="ref-heading">Order Summary</div>
								<div class="ref-students"></div>
								<hr/>
								<div class="ref-coupon-code">
									<div class="ref-coupon-container">
										<div class="ref-coupon-input-holder"><input id="ref-coupon-input"
										                                            class="ref-form-control"
										                                            name="coupon-code" type="text"
										                                            maxlength="32" autocomplete="off"
										                                            placeholder="Enter coupon or promo code"/><span
													class="ref-coupon-input-clear" title="Clear">✕</span></div>
										<div class="ref-button ref-button-success ref-add-code inactive">Apply</div>
									</div>
									<div class="ref-validation-error"></div>
								</div>
								<hr/>
								<div class="ref-totals">
									<div class="ref-subtotal">
										<div class="ref-row"><span>Subtotal</span><span></span></div>
									</div>
									<div class="ref-applied-coupon">
										<div class="ref-row">
											<div class="ref-row"><span></span><span
														class="ref-remove-coupon">remove</span></div>
											<span></span>
										</div>
										<div class="ref-applied-coupon-error"></div>
									</div>
									<div class="ref-shipping">
										<div class="ref-row"><span>Shipping</span><span></span></div>
									</div>
									<div class="ref-taxes">
										<div class="ref-row"><span></span><span></span></div>
									</div>
								</div>
								<hr/>
								<div class="ref-total">
									<div class="ref-row"><span>Total</span><span></span></div>
									<div class="ref-total-note">All prices are in <span></span></div>
								</div>
							</div>
							<div class="ref-summary-toggle ref-field-collapsible"><span class="ref-field-toggle">Show Summary</span>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('templates/base.php'); ?>
