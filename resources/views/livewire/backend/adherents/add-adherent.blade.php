  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ajout d'un Adherent</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Accueil</a></li>
              <li class="breadcrumb-item active"><a href="/backend/adherents">Liste Adherents</a></li>
              <li class="breadcrumb-item active">Ajouter Adherent</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulaire Adherent</h3>
              </div>
              <!-- /.card-header -->

              <!-- form start -->
              <form wire:submit.prevent="store">
                <div class="card-body">
                  <div class="form-group">
                    <label for="numero_adherent">Numéro Adherent</label>
                    <input type="text" wire:model="numero_adherent" class="form-control" placeholder="Numéro Adherent">
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
                    <select class="form-control" wire:model="statut_actuel" >
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

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input wire:model="password" type="password" class="form-control" id="password" placeholder="Password">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirmation Password</label>
                    <input wire:model="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirmation Password">
                    @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>


                  <div class="custom-control custom-checkbox">
                    <input wire:model="benevole" class="custom-control-input" type="checkbox" id="benevole" checked="">
                    <label for="benevole" class="custom-control-label">benevole</label>
                    @error('benevole') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input wire:model="portfolio_public" class="custom-control-input" type="checkbox" id="portfolio_public" checked="">
                    <label for="portfolio_public" class="custom-control-label">portfolio_public</label>
                    @error('portfolio_public') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  
                  <div class="form-group">
                    <label for="photo">Photo de Profil</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input wire:model="photo" type="file" accept="image/*"  class="custom-file-input" id="photo">
                        <label class="custom-file-label" for="photo">Séléctionner Une Image</label>
                       
                      </div>
                     
                    </div>
                    <div> @error('photo') <div> <span class="text-danger">{{ $message }}</span></div> @enderror
                      @if($photo)
                      <div>  <img src="{{$photo->temporaryURL()}}" alt="Image" width="120"></div>
                      @endif
                      </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('backend.adherents')}}" type="button" class="btn btn-primary">Annuler</a>
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
              </form>
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>