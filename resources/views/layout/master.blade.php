<!DOCTYPE html>

<html lang="en">

  <head>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.css" />
    <link rel="stylesheet" href="https://pendataan.baliprov.go.id/assets/frontend/map/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="../assets/images/logo.png">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="../libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
    <!-- build:css ../assets/css/app.min.css -->
    <link rel="stylesheet" href="../libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="../libs/bower/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="../libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/core.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <!-- endbuild -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="../libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
    
  <body class="menubar-left menubar-unfold menubar-light theme-primary">
    <!--============= start main area -->

    <!-- APP NAVBAR ==========-->
    <nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
      
      <!-- navbar header -->
      <div class="navbar-header">
    

        <a href="#" class="navbar-brand">
          <span class="brand-icon"><i class="fa fa-gg"></i></span>
          <span class="brand-name">Covid</span>
        </a>
      </div><!-- .navbar-header -->
      
      <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
            <li class="hidden-float hidden-menubar-top">
              <a href="javascript:void(0)" role="button" id="menubar-fold-btn" class="hamburger hamburger--arrowalt is-active js-hamburger">
                <span class="hamburger-box"><span class="hamburger-inner"></span></span>
              </a>
            </li>
            <li>
              <h5 class="page-title hidden-menubar-top hidden-float">@yield('title')</h5>
            </li>
          </ul>

          <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
            <li class="nav-item dropdown hidden-float">
              <a href="javascript:void(0)" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
                <i class="zmdi zmdi-hc-lg zmdi-search"></i>
              </a>
            </li>

          </ul>
        </div>
      </div><!-- navbar-container -->
    </nav>
    <!--========== END app navbar -->
    <!-- APP ASIDE ==========-->
    <aside id="menubar" class="menubar light">
      <div class="app-user">
        <div class="media">
          <div class="media-left">
            <div class="avatar avatar-md avatar-circle">
              <a href="javascript:void(0)"><img class="img-responsive" src="img/pp.jpg" alt="avatar"/></a>
            </div><!-- .avatar -->
          </div>
          <div class="media-body">
            <div class="foldable">
              <h5><a href="javascript:void(0)" class="username">Ketut Nila Arta</a></h5>
              <ul>
                <li class="dropdown">
                  <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <small>1705551059</small>
                    <span class="caret"></span>
                  </a>
                </li>
              </ul>
            </div>
          </div><!-- .media-body -->
        </div><!-- .media -->
      </div><!-- .app-user -->
      <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
          <ul class="app-menu">
            <li class="has-submenu">
              <a href="javascript:void(0)" class="submenu-toggle">
                <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
                <span class="menu-text">Dashboards</span>
                <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
              </a>
              <ul class="submenu">
                <li><a href="/index.php"><span class="menu-text">Dashboard</span></a></li>
                <li><a href="/data-kabupaten"><span class="menu-text">Tambah Data</span></a></li>
              </ul>
            </li>
            
            <li class="has-submenu">
              <a href="javascript:void(0)" class="submenu-toggle">
                <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
                <span class="menu-text">Profile</span>
                <span class="label label-warning menu-label">1</span>
                <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i>
              </a>
              <ul class="submenu">
                <li><a href="#"><span class="menu-text">About Me</span></a></li>
              </ul>
            </li>

          </ul><!-- .app-menu -->
        </div><!-- .menubar-scroll-inner -->
      </div><!-- .menubar-scroll -->
    </aside>
    <!--========== END app aside -->
    <!-- navbar search -->
    <div id="navbar-search" class="navbar-search collapse">
      <div class="navbar-search-inner">
        <form action="#">
          <span class="search-icon"><i class="fa fa-search"></i></span>
          <input class="search-field" type="search" placeholder="search..."/>
        </form>
        <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false">
          <i class="fa fa-close"></i>
        </button>
      </div>
      <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
    </div><!-- .navbar-search -->

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
      <div class="wrap">
        <section class="app-content">
          @yield('content')
          {{-- <router-view></router-view> --}}
        </section><!-- .app-content -->
      </div><!-- .wrap -->
      <!-- APP FOOTER -->
      <div class="wrap p-t-0">
        <footer class="app-footer">
          <div class="clearfix">
            <ul class="footer-menu pull-right">
              <li><a href="javascript:void(0)">Careers</a></li>
              <li><a href="javascript:void(0)">Privacy Policy</a></li>
              <li><a href="javascript:void(0)">Feedback <i class="fa fa-angle-up m-l-md"></i></a></li>
            </ul>
            <div class="copyright pull-left">Copyright RaThemes 2016 &copy;
            </div>
          </div>
        </footer>
      </div>
      <!-- /#app-footer -->
    </main>

    <!--========== END app main -->
      <!-- APP CUSTOMIZER -->
    <div id="app-customizer" class="app-customizer">
      <a href="javascript:void(0)" 
        class="app-customizer-toggle theme-color" 
        data-toggle="class" 
        data-class="open"
        data-active="false"
        data-target="#app-customizer">
        <i class="fa fa-gear"></i>
      </a>
      
      <div class="customizer-tabs">
          <!-- tabs list -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#menubar-customizer" aria-controls="menubar-customizer" role="tab" data-toggle="tab">Menubar</a></li>
          <li role="presentation"><a href="#navbar-customizer" aria-controls="navbar-customizer" role="tab" data-toggle="tab">Navbar</a></li>
        </ul><!-- .nav-tabs -->

        <div class="tab-content">
          <div role="tabpanel" class="tab-pane in active fade" id="menubar-customizer">
            <div class="hidden-menubar-top hidden-float">
              <div class="m-b-0">
                <label for="menubar-fold-switch">Fold Menubar</label>
                <div class="pull-right">
                  <input id="menubar-fold-switch" type="checkbox" data-switchery data-size="small" />
                </div>
              </div>
              <hr class="m-h-md">
            </div>
            <div class="radio radio-default m-b-md">
              <input type="radio" id="menubar-light-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="light">
              <label for="menubar-light-theme">Light</label>
            </div>
            <div class="radio radio-inverse m-b-md">
              <input type="radio" id="menubar-dark-theme" name="menubar-theme" data-toggle="menubar-theme" data-theme="dark">
              <label for="menubar-dark-theme">Dark</label>
            </div>
          </div><!-- .tab-pane -->
          <div role="tabpanel" class="tab-pane fade" id="navbar-customizer">
            <!-- This Section is populated Automatically By javascript -->
          </div><!-- .tab-pane -->
        </div>
      </div><!-- .customizer-taps -->
    </div><!-- #app-customizer -->

    <!-- build:js ../assets/js/core.min.js -->
    <script src="../libs/bower/jquery/dist/jquery.js"></script>
    <script src="../libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="../libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="../libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="../libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="../libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="../libs/bower/PACE/pace.min.js"></script>
    <!-- endbuild -->
    <!-- build:js ../assets/js/app.min.js -->
    <script src="../assets/js/library.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="../libs/bower/moment/moment.js"></script>
    <script src="../libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="../assets/js/fullcalendar.js"></script>
    
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script> --}}
    <script src="/js/app.js"></script>
    @yield('js')
  </body>
</html>