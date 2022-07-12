<div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Liste Inscriptions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
                        <li class="breadcrumb-item active">Liste Inscriptions</li>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Inscriptions</h3> 

                            <div class="card-tools">
                         
                                <div class="input-group " >

                                
                                    <select class="form-control f" wire:click="changerFormation($event.target.value)">
                                        <option value="0">-- Tous les Formations --</option>
                                        @foreach($formations as $formation)
                                        <option value="{{ $formation->id }}">{{ $formation->titre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            @if(session()->has('message'))
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
                                        <th>Formation</th>
                                        <th>Adherent</th>
                                        <th>Date Inscription</th>
                                        <th>Statut</th>
                                        <th>Actions</th>

                                    </tr>




                                </thead>
                                <tbody>

                                    @foreach ($listInscriptions as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->formation->titre}}</td>

                                        <td>{{$item->adherent->nom}}</td>
                                        <td>{{$item->date_inscription}} </td>
                                        <td>
                                        @if ($item->statut=='encours')
                                            <span class="badge badge-warning">{{$item->statut}}</span>
                                            @else
                                            @if($item->statut=='valide')
                                            <span class="badge badge-success">{{$item->statut}}</span>
                                            @else

                                            <span class="badge badge-danger">{{$item->statut}}</span>
                                            @endif
                                            @endif

                                        </td>

                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">Actions </button>

                                                <div class="dropdown-menu" role="menu">
                                                    
                                                    <a href=""  wire:click.prevent="validerInscription({{$item->id}})" class="dropdown-item"> <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Valider</a>

                                                    <a wire:click.prevent="annulerInscription({{$item->id}})" class="dropdown-item" href="#" onclick="confirm('Voulez Vous vraiment Annuler cet inscription ?')|| event.stopImmediatePropagation()" >
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        Annuler</a>

                                                        <a class="dropdown-item" href="#"  wire:click.prevent="initialiserInscription({{$item->id}})">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        En Ettent</a>


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

                            {{$listInscriptions->links()}}

                        </div>

                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>