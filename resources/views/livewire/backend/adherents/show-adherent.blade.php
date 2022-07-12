  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Détails Adherent</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/backend/adherents">Liste Adherents</a></li>
              <li class="breadcrumb-item active">Modifier Adherent</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->




    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-check"></i> Message</h5>
          {{ session('message') }}
        </div>
        @endif
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($adherent->photo!="")
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/images/adherents')}}/{{$adherent->photo}}" alt="adherent image">
                  @else
                  <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/images/users')}}/default.png" alt="adherent image">
                  @endif
                </div>

                <h3 class="profile-username text-center">{{$adherent->nom}} {{$adherent->prenom}}</h3>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Statut Actuel</b>
                    <a class="float-right">{{$adherent->statut_actuel}} </a>
                  </li>
                  <li class="list-group-item">
                    <b>Téléphone</b> <a class="float-right">{{$adherent->telephone}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{$adherent->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Statut du Compte</b> <a class="float-right"> 
                      @if ($adherent->compte_statut=='encours')
                      <span class="badge badge-warning">En attent de Validation</span>
                      @else
                      @if($adherent->compte_statut=='ok')
                      <span class="badge badge-success">Validé</span>
                      @else

                      <span class="badge badge-danger">Non Accepté</span>
                      @endif
                      @endif

                  </li>
                </ul>

                <a href="#" wire:click.prevent="validerInscription<({{$adherent->id}})" class="btn btn-success btn-block"><b>Valider l'inscription</b></a>
                <a href="{{route('backend.adherents.edit',['id_adherent'=>$adherent->id])}}" class="btn btn-warning btn-block"><b>Modifier</b></a>
                <a href="#" onclick="confirm('Voulez Vous vraiment supprimer cet adherent ?')|| event.stopImmediatePropagation()" wire:click.prevent="deleteAdherent({{$adherent->id}})" class="btn btn-danger btn-block"><b>Supprimer</b></a>


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

                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Notes</strong>

                <p class="text-muted">

                </p>

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
                  <li class="nav-item"><a class="nav-link active" href="#tab1" data-toggle="tab">Réservations Machines</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Formations</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Projets</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="tab1">


                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab2">


                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab3">

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