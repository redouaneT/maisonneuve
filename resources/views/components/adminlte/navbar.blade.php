<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light @if(!Auth::check()) mx-0 @endif">
    <!-- Left navbar links -->
    <ul class="navbar-nav ">

        @canany(['isAdmin', 'isStudent'], auth()->user())
               <!-- Sidebar toggle button-->
               <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        @endcanany

        <li class="nav-item d-none d-sm-inline-block">
            @can('isAdmin', auth()->user())
                <a href="{{ route('admin.home') }}" class="nav-link">@lang('navigation.home')</a>
            @elsecan('isStudent', auth()->user())
                <a href="{{ route('home') }}" class="nav-link">@lang('navigation.home')</a>
            @endcan
        </li>
            

        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">@lang('navigation.contact')</a>
        </li>
     
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @lang('navigation.help')
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <a class="dropdown-item" href="#">@lang('navigation.faq')</a>
                <a class="dropdown-item" href="#">@lang('navigation.support')</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">@lang('navigation.contact')</a>
            </div>
        </li>
    </ul>

    @if(Auth::check())
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="@lang('navigation.search')" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    @endif

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if(Auth::check())

            @canany(['isAdmin', 'isStudent'], auth()->user())
                <!-- Username -->
                <li class="nav-item d-none d-sm-inline-block">
                    {{-- <a class="navbar-brand" href="{{route("public.dashboard")}}">{{Auth::user() ? Auth::user()->username : 'Guest'}}</a> --}}
                </li>
                <!-- Documents link -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{route('documents.index')}}">@lang('navigation.documents')</a>
                </li>
                <!-- posts link -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{route('articles.index')}}">@lang('navigation.articles')</a>
                </li>
                <!-- See profile link  -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link" href="{{route('etudiant.show', ['etudiant'=> auth()->user()->id])}}">@lang('navigation.profil')</a>
                </li>
            @endcanany
           
            <!-- logout   -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route("logout")}}" class="nav-link">@lang('navigation.logout')</a>
            </li>

            @canany(['isAdmin', 'isStudent'], auth()->user())
               <!-- Messages Dropdown Menu -->
               <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
            
                            <img src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('adminlte/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                                class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 nouveaux messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 demande d'amis
                        <span class="float-right text-muted text-sm">12 heures</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 nouveaux reports
                        <span class="float-right text-muted text-sm">2 jours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">Voir toutes les notifications</a>
                </div>
            </li>
        @endcanany
        @else
            <!-- login   -->
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route("login")}}" class="nav-link">@lang('navigation.login')</a>
            </li>
        @endif
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('lang.switch', 'en')}}">EN</a>
            <a href="{{ route('lang.switch', 'fr') }}">FR</a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
