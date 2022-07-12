<div>
	<section class="page-title bg-1">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block text-center">
						<span class="text-white">Cohabit Fablab</span>
						<h1 class="text-capitalize mb-5 text-lg">Portfolios - {{$nom}} {{$prenom}}</h1>

						<!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
          </ul> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section doctor-single">
		<div class="container">

			<div class="row">
				<div class="col-sm-4">
					<!--left col-->

				
					<div class="text-center">

						@if($new_photo)
						<img src="{{$new_photo->temporaryURL()}}"  width="200"  alt="avatar">
						@else
						<img src="{{ asset('assets/images/users/images_profils') }}/{{$photo}}" width="200" alt="avatar">

						@endif
						<h6>Changer l'Image de Profils...</h6>
						<input type="file" accept="image/*" wire:model="new_photo" class="text-center center-block">
					</div>
					<br>
					<div class="text-center">
					<div class="form-group">
										<label for="titre">Titre</label>
										<input type="text" wire:model="titre" class="form-control" placeholder="Titre">
										@error('titre') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
										<label for="introduction">Introduction</label>
										<textarea rows="13" cols="20" wire:model="introduction" class="form-control" placeholder="Introduction"> </textarea>
										@error('introduction') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<button type="submit" class="btn btn-primary">Enregistrer</button>
					</div>






				</div>
				<!--/col-3-->
				<div class="col-sm-8">

					@if(session()->has('message'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h5><i class="icon fas fa-check"></i> Message</h5>
						{{ session('message') }}
					</div>
					@endif
					<nav>
						<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
							<a wire:ignore class="nav-item nav-link active" id="informations-tab" data-toggle="tab" href="#informations" role="tab" aria-controls="nav-home" aria-selected="true">Informations</a>
							<a wire:ignore class="nav-item nav-link" id="formations-tab" data-toggle="tab" href="#formations" role="tab" aria-controls="nav-profile" aria-selected="false">Formations</a>
							<a wire:ignore class="nav-item nav-link" id="competences-tab" data-toggle="tab" href="#competences" role="tab" aria-controls="nav-contact" aria-selected="false">Compétences</a>
							<a wire:ignore class="nav-item nav-link" id="realisations-tab" data-toggle="tab" href="#realisations" role="tab" aria-controls="nav-contact" aria-selected="false">Réalisations</a>
						</div>
					</nav>


					<div class="tab-content mt-3">
						<div wire:ignore.self class="tab-pane fade show active" id="informations" role="tabpanel" aria-labelledby="informations-tab">

						<form wire:submit.prevent="modifierUser">
								<div class="card-body">
									<div class="form-group">
										<label for="numero_adherent">Numéro Adherent</label>
										<input type="text" wire:model="numero_adherent" disabled class="form-control" placeholder="Numéro Adherent">
										@error('numero_adherent') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
										<label for="nom">Nom</label>
										<input type="text" wire:model="nom" class="form-control" placeholder="Nom Adherent">
										@error('nom') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
										<label for="prenom">Prénom</label>
										<input type="text" wire:model="prenom" class="form-control" placeholder="Prénom Adherent">
										@error('prenom') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
										<label for="telephone">Téléphone</label>
										<input wire:model="telephone" type="text" class="form-control" id="telephone" placeholder="Téléphone">
										@error('telephone') <span class="text-danger">{{ $message }}</span> @enderror
									</div>

									<div class="form-group">
										<label for="statut_actuel">Statut Actuel</label>
										<select class="form-control" wire:model="statut_actuel">
											<option value="etudiant-ub">Etudiant UB</option>
											<option value="etudiant-hors-ub">Etudiant hors UB</option>
											<option value="personnel-ub">Personnel UB</option>
											<option value="entreprise-laboratoire">Entreprise/Laboratoire</option>
											<option value="autre">Autre</option>
										</select>
										@error('statut_actuel') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<div class="form-group">
										<label for="metier">metier</label>
										<input wire:model="metier" type="text" class="form-control" id="metier" placeholder="metier">
										@error('metier') <span class="text-danger">{{ $message }}</span> @enderror
									</div>



									<div class="form-group">
										<label for="email">Email</label>
										<input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">
										@error('email') <span class="text-danger">{{ $message }}</span> @enderror
									</div>

								

									<div class="custom-control custom-checkbox">
										<input wire:model="benevole" class="custom-control-input" type="checkbox" @if($benevole) checked="true"  @endif id="benevole">
										<label for="benevole" class="custom-control-label">Benevole {{$benevole}}</label>
										@error('benevole') <span class="text-danger">{{ $message }}</span> @enderror
									</div>
									<div class="custom-control custom-checkbox">
										<input wire:model="portfolio_public" class="custom-control-input" type="checkbox" id="portfolio_public">
										<label for="portfolio_public" class="custom-control-label">Portfolio Public</label>
										@error('portfolio_public') <span class="text-danger">{{ $message }}</span> @enderror
									</div>




								</div>
								<!-- /.card-body -->

								<div class="card-footer">

									<button type="submit" class="btn btn-primary">Enregistrer</button>
								</div>
							</form>



						</div>
						<!--/tab-pane-->
						<div wire:ignore.self class="tab-pane fade" id="formations" role="tabpanel" aria-labelledby="formations-tab">

							<div class="row mb-3">
								<div class="col-8">
									Mes Formations
								</div>
								<div class="col-4">
									<button wire:click.prevent="nouvelleFormation()" type="button" class="btn  btn-info">Ajouter Formation</button>

								</div>
							</div>
							<div class="card-body table-responsive p-0 ">
								<table class="table table-hover text-nowrap">
									<thead>

										<tr>

											<th style="width: 10px">#</th>
											<th>Titre</th>
											<th>Ecole</th>
											<th>Date</th>
											<th>Actions</th>

										</tr>




									</thead>
									<tbody>

										@foreach ($formations as $formation)

										<tr>
											<td>{{$formation->id}}</td>

											<td><a>{{$formation->titre}} </a></td>

											<td>{{$formation->ecole}}</td>
											<td>{{$formation->date}}</td>


											<td>

												<button wire:click.prevent="modifierFormation({{$formation->id}})" type="button" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Modifier</button>
												<button wire:click.prevent="supprimerFormation({{$formation->id}})" type="button" class="btn btn-danger btn-sm" href="#" onclick="confirm('Voulez Vous vraiment supprimer cet adherent ?')|| event.stopImmediatePropagation()"><i class="fas fa-pencil-alt"></i> Supprimer</button>



											</td>
										</tr>
										@endforeach


									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-6">
									{{$titreFormulaireFormation}}
								</div>

							</div>
							<div class="card-body table-responsive p-0 mb-3">
								<form wire:submit.prevent="enregistrerFormation">
									<div class="card-body">

										<div class="form-group">
											<label for="titre">Titre</label>
											<input type="text" wire:model="formation.titre" class="form-control" placeholder="Titre (Ex : Licence Pro)">
											@error('titre') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="form-group">
											<label for="ecole">Ecole</label>
											<input type="text" wire:model="formation.ecole" class="form-control" placeholder="ecole">
											@error('ecole') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="form-group">
											<label for="date">Date</label>
											<input type="text" wire:model="formation.date" class="form-control" placeholder="Daet (Ex : 2015-2018)">
											@error('date') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="form-group">
											<label for="details">Détails</label>
											<input type="text" wire:model="formation.details" class="form-control" placeholder="Détails de formation">
											@error('details') <span class="text-danger">{{ $message }}</span> @enderror
										</div>




									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<button type="submit" class="btn btn-primary">Enregistrer</button>
									</div>
								</form>
							</div>

						</div>
						<!--/tab-pane-->


						<div wire:ignore.self class="tab-pane fade" id="competences" role="tabpanel" aria-labelledby="competences-tab">
							competences
						</div>
						<!--/tab-pane-->
						<div wire:ignore.self class="tab-pane fade" id="realisations" role="tabpanel" aria-labelledby="realisations-tab">
							<div class="row mb-3">
								<div class="col-8">
									Mes Réalisations
								</div>
								<div class="col-4">
									<button wire:click.prevent="nouvelleRealisation()" type="button" class="btn  btn-info">Ajouter Réalisation</button>

								</div>
							</div>
							<div class="card-body table-responsive p-0 ">
								<table class="table table-hover text-nowrap">
									<thead>

										<tr>

											<th style="width: 10px">#</th>
											<th>Titre</th>
											<th>Description</th>
											<th>Actions</th>

										</tr>




									</thead>
									<tbody>

										@foreach ($realisations as $realisation)

										<tr>
											<td>{{$realisation->id}}</td>

											<td><a>{{$realisation->titre}} </a></td>

											<td>{{$realisation->description}}</td>



											<td>

												<button wire:click.prevent="modifierRealisation({{$realisation->id}})" type="button" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i> Modifier</button>
												<button wire:click.prevent="supprimerRealisation({{$realisation->id}})" type="button" class="btn btn-danger btn-sm" href="#" onclick="confirm('Voulez Vous vraiment supprimer cette réalisation ?')|| event.stopImmediatePropagation()"><i class="fas fa-pencil-alt"></i> Supprimer</button>



											</td>
										</tr>
										@endforeach


									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-6">
									{{$titreFormulaireRealisation}}
								</div>

							</div>
							<div class="card-body table-responsive p-0 mb-3">
								<form wire:submit.prevent="enregistrerRealisation">
									<div class="card-body">

										<div class="form-group">
											<label for="titre">Titre</label>
											<input type="text" wire:model="realisation.titre" class="form-control" placeholder="Titre ">
											@error('titre') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="form-group">
											<label for="description">Description</label>
											<input type="text" wire:model="realisation.description" class="form-control" placeholder="description">
											@error('description') <span class="text-danger">{{ $message }}</span> @enderror
										</div>

										<div class="form-group">
											<label for="image">Image</label>
											<input type="file" wire:model="realisation_edit_photo" class="form-control" placeholder="Image">
											@error('image') <span class="text-danger">{{ $message }}</span> @enderror

											@if($realisation_edit_photo)
											<img src="{{$realisation_edit_photo->temporaryURL()}}" width="150" alt="image">
											@else
											<img src="{{ asset('assets/images/users/realisations') }}/{{$realisation->image}}" width="150" alt="image">
											@endif
										

										</div>

										<div class="form-group">
											<label for="lien">Lien</label>
											<input type="text" wire:model="realisation.lien" class="form-control" placeholder="Lien">
											@error('lien') <span class="text-danger">{{ $message }}</span> @enderror
										</div>




									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<button type="submit" class="btn btn-primary">Enregistrer</button>
									</div>
								</form>
							</div>
						</div>
						<!--/tab-pane-->

					</div>
					<!--/tab-pane-->
				</div>
				<!--/tab-content-->

			</div>
			<!--/col-9-->

		</div>
	</section>

</div>