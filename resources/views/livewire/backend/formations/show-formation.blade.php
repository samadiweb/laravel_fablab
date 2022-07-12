  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modification d'une Formations</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/backend/formations">Liste Formations</a></li>
              <li class="breadcrumb-item active">Modifier Formation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/images/formations')}}/{{$image}}" alt="formation image">
                </div>

                <h3 class="profile-username text-center">{{$titre}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Lien Wiki</b>
                    <a class="float-right" href="{{$lien_wiki}}">{{$lien_wiki}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Autre info</b> <a class="float-right">*****</a>
                  </li>
                  <li class="list-group-item">
                    <b>Autre info</b> <a class="float-right">*****</a>
                  </li>
                </ul>

                <a href="{{route('backend.formations.edit',['id_formation'=>$id_formation])}}" class="btn btn-warning btn-block"><b>Modifier</b></a>
                <a href="#" onclick="confirm('Voulez Vous vraiment supprimer cet formation ?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteFormation({{$id_formation}})" class="btn btn-danger btn-block"><b>Supprimer</b></a>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Plus d'infos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Déscription</strong>

                <p class="text-muted">
                  {{$description}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Notes</strong>

                <p class="text-muted">{{$notes}} </p>

                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Inscriptions en attente</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Inscriptions Validées</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Inscriptions Non Validées</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="tab1">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Liste Inscriptions en attente</h3>


                      </div>
                      <div class="card-header">
                        @if(session()->has('message_enregistre'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-check"></i> Message</h5>
                          {{ session('message') }}
                        </div>
                        @endif

                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>

                            <tr>

                              <th>ID</th>
                              <th>Nom </th>
                              <th>Statut Actuel</th>
                              <th>Portfolio</th>
                              <th>Date Inscription</th>
                              <th>Actions</th>

                            </tr>




                          </thead>
                          <tbody>

                            @foreach ($listInscriptionsAtt as $item)

                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->adherent->nom}} {{$item->adherent->prenom}}</td>

                              <td>{{$item->adherent->statut_actuel}}</td>
                              <td>{{$item->id}} </td>
                              <td>{{$item->date_inscription}} </td>

                              <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Actions </button>

                                  <div class="dropdown-menu" role="menu">

                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment Valider cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="validerInscription({{$item->id}},'valide')">
                                      <i class="fas fa-check">
                                      </i>
                                      Valider</a>
                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment Annuler cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="validerInscription({{$item->id}},'annule')">
                                      <i class="fas fa-window-close">
                                      </i>
                                      Annuler</a>


                                  </div>
                                </div>



                              </td>
                            </tr>
                            @endforeach


                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->

                      <div class="d-flex justify-content-center flex-nowrap">

                        {{$listInscriptionsAtt->links()}}

                      </div>

                    </div>

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab2">

                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Liste Inscriptions Validées</h3>


                      </div>
                      <div class="card-header">
                        @if(session()->has('message_valide'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-check"></i> Message</h5>
                          {{ session('message_valide') }}
                        </div>
                        @endif

                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>

                            <tr>

                              <th>ID</th>
                              <th>Nom </th>
                              <th>Statut Actuel</th>
                              <th>Portfolio</th>
                              <th>Date Inscription</th>
                              <th>Actions</th>

                            </tr>




                          </thead>
                          <tbody>

                            @foreach ($listInscriptionsValidees as $item)

                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->adherent->nom}} {{$item->adherent->prenom}}</td>

                              <td>{{$item->adherent->statut_actuel}}</td>
                              <td>{{$item->id}} </td>
                              <td>{{$item->date_inscription}} </td>

                              <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Actions </button>

                                  <div class="dropdown-menu" role="menu">

                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment annuler la Validation de cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="validerInscription({{$item->id}},'enregistre')">
                                      <i class="fas fa-check">
                                      </i>
                                      Annuler Validation</a>
                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment Annuler cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="validerInscription({{$item->id}},'annule')">
                                      <i class="fas fa-window-close">
                                      </i>
                                      Annuler Inscription</a>


                                  </div>
                                </div>



                              </td>
                            </tr>
                            @endforeach


                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->

                      <div class="d-flex justify-content-center flex-nowrap">

                        {{$listInscriptionsValidees->links()}}

                      </div>

                    </div>

                  </div>

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab3">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Liste Inscriptions Non Validées</h3>


                      </div>
                      <div class="card-header">
                        @if(session()->has('message_annule'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                          <h5><i class="icon fas fa-check"></i> Message</h5>
                          {{ session('message_annule') }}
                        </div>
                        @endif

                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>

                            <tr>

                              <th>ID</th>
                              <th>Nom </th>
                              <th>Statut Actuel</th>
                              <th>Portfolio</th>
                              <th>Date Inscription</th>
                              <th>Actions</th>

                            </tr>




                          </thead>
                          <tbody>

                            @foreach ($listInscriptionsNonValidees as $item)

                            <tr>
                              <td>{{$item->id}}</td>
                              <td>{{$item->adherent->nom}} {{$item->adherent->prenom}}</td>

                              <td>{{$item->adherent->statut_actuel}}</td>
                              <td>{{$item->id}} </td>
                              <td>{{$item->date_inscription}} </td>

                              <td>
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Actions </button>

                                  <div class="dropdown-menu" role="menu">
                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment Valider cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="validerInscription({{$item->id}},'valide')">
                                      <i class="fas fa-check">
                                      </i>
                                      Valider</a>
                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment annuler la Validation de cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="validerInscription({{$item->id}},'enregistre')">
                                      <i class="fas fa-check">
                                      </i>
                                      Restourer (En attente)</a>
                                    <a class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment Annuler cet Inscription ?')|| event.stopImmediatePropagation()" wire:click.prevent="supprimerInscription({{$item->id}})">
                                      <i class="fas fa-window-close">
                                      </i>
                                      Supprimer </a>


                                  </div>
                                </div>



                              </td>
                            </tr>
                            @endforeach


                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->

                      <div class="d-flex justify-content-center flex-nowrap">

                        {{$listInscriptionsNonValidees->links()}}

                      </div>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
  </div>
  <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->



  </div>