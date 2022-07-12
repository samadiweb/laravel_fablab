  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('backend.dashboard')}}" class="brand-link">
      <img src="{{ asset('assets/images/general/logo-cohabit.png')}}" alt="FabLab" class="brand-image  elevation-3" ><br>
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/images/general/user.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->nom}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- generate 
               @foreach ($menu as $menuitem)
          <li class="nav-item">
            <a href="{{route('frontend.presentation')}}" class="nav-link">
              <i class="nav-icon  {{$menuitem['icon']}}"></i>
              <p>
              {{$menuitem['title']}}
                
              </p>
            </a>
          </li>
          @endforeach
        -->

      

        <li class="nav-item">
            <a href="{{route('backend.dashboard')}}" class="nav-link">
              <i class="nav-icon  fas fa-th"></i>
              <p>
              Dashboard
                
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{route('backend.adherents')}}" class="nav-link">
              <i class="nav-icon  fas fa-user"></i>
              <p>
              Adherents
                
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{route('backend.machines')}}" class="nav-link">
              <i class="nav-icon  fas fa-microchip"></i>
              <p>
              Machines
                
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{route('backend.reservations')}}" class="nav-link">
              <i class="nav-icon  fas fa-microchip"></i>
              <p>
              Réservations Machines
                
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{route('backend.projects')}}" class="nav-link">
              <i class="nav-icon  fas fa-tasks"></i>
              <p>
              Projets
                
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="{{route('backend.formations')}}" class="nav-link">
              <i class="nav-icon  fas fa-chalkboard-teacher"></i>
              <p>
              Formations
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('backend.formations.inscriptions')}}" class="nav-link">
              <i class="nav-icon  fas fa-chalkboard-teacher"></i>
              <p>
              Inscriptions Formations
                
              </p>
            </a>
          </li>
          <li class="nav-header">Site Web Front</li>
          
        <li class="nav-item">
            <a href="{{route('frontend.home')}}" class="nav-link">
              <i class="nav-icon  fas fa-at"></i>
              <p>
              Consulter le Site
                
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon  fas fa-at"></i>
              <p>
              Edit Accueil
                
              </p>
            </a>
          </li>

        <li class="nav-item">
            <a href="{{route('backend.pages.presentation.edit')}}" class="nav-link">
              <i class="nav-icon  fas fa-at"></i>
              <p>
              Edit Présentation
                
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Main Sidebar Container -->