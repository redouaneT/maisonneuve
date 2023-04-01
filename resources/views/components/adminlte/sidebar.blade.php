<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

      <img src="{{asset('adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      
           style="opacity: .8">
      <span class="brand-text font-weight-light">Forum Maisonneuve</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            {{-- @if (Auth::check() && Auth::user()->hasRole('admin'))
                <a class="navbar-brand d-block" href="{{route("admin.home")}}">{{Auth::user() ? Auth::user()->username : 'Guest'}}</a>
            @else
                <a class="navbar-brand d-block" href="{{route("student.home")}}">{{Auth::user() ? Auth::user()->username : 'Guest'}}</a>
            @endif --}}
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @can('isAdmin', auth()->user())
                 <!-- user manager for admin -->
                 <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">

                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Gestion des étudiants
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.etudiant.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Liste des étudiants</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.etudiant.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Ajouter un étudiants</p>
                        </a>
                    </li>
                    </ul>
                </li>
            @endcan
             <!-- Posts manager -->
             <li class="nav-item menu-open">
                <a href="#" class="nav-link active">

                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    Gestion des articles
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('articles.create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rédiger un article</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('articles.my')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Voir mes articles</p>
                    </a>
                </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>