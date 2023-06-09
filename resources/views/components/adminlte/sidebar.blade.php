<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route("home")}}" class="brand-link">

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
            @can('isAdmin', auth()->user())
            <a class="navbar-brand d-block" href="{{route("admin.home")}}">{{Auth::user()->username}}</a>
            @else
            <a class="navbar-brand d-block" href="{{route("home")}}">{{Auth::user()->username}}</a>
            @endcan
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
                        @lang('navigation.student_manage')
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.etudiant.index')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p> @lang('navigation.student_list')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.etudiant.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> @lang('navigation.student_add')</p>
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
                    @lang('navigation.article_manage')
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('articles.create')}}" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>  @lang('navigation.article_add')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('articles.my')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p> @lang('navigation.article_my')</p>
                    </a>
                </li>
                </ul>
            </li>
             <!-- Documents manager -->
             <li class="nav-item menu-open">
                <a href="#" class="nav-link active">

                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                    @lang('navigation.documents')
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('documents.create')}}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p> @lang('navigation.file_add')</p>
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