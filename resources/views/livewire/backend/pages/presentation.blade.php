  <div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Page Présentation</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/backend">Dashboard</a></li>
              <li class="breadcrumb-item active"><a href="/backend/presentation/edit">Edit Page Présentation</a></li>

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
                <h3 class="card-title">Formulaire</h3>
              </div>
           

              <!-- form start -->
              <form wire:submit.prevent="store">
                <div class="card-body">

                @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Message</h5>
                  {{ session('message') }}
                </div>
                @endif
                <br>
                  <div class="form-group">
                    <label for="titre">Titre</label>
                    <input wire:model="titre" type="text" class="form-control" id="titre" placeholder="Titre de présentation">
                    @error('titre') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="presentation">Présentation</label>

                    <textarea wire:model="presentation" class="form-control" id="presentation" placeholder="Texte de présentation"></textarea>
                    @error('presentation') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>

                  <div class="form-group">
                    <label for="image">Image de présentation</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input wire:model="image" type="file" accept="image/*" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Séléctionner Une Image</label>

                      </div>

                    </div>
                    <div> @error('image') <div> <span class="text-danger">{{ $message }}</span></div> @enderror
                    @if($newImage)
                                        <img src="{{$newImage->temporaryURL()}}" alt="image" width="120">
                                    @else
                                        <img src="{{asset('assets/front/images/pages/presentation')}}/{{$image}}" alt="Image" width="120">
                                    @endif
                    </div>
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{route('backend.dashboard')}}" type="button" class="btn btn-primary">Annuler</a>
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