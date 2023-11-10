<!DOCTYPE html>
<html lang="en">
{{--
<head>
    <title>Laravel 10 Datatables Date Range Filter</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
--}}
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/style.css?ver=7oct23-1') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/simple-line-icons.min.css') }}" rel="stylesheet" />

  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css" rel="stylesheet"> --}}

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

  {{--
  <title>Exercise MCK</title>
  <!-- Icons -->
  <link href="{{ asset('vendors/css/flag-icon.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendors/css/simple-line-icons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css?ver=7oct23-1') }}" rel="stylesheet">
  <link href="{{ asset('vendors/css/select2.min.css') }}" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css" rel="stylesheet">
  <script src="{{ asset('js/env.js?ver=7oct23-1') }}"></script>
  <script src="{{ asset('js/lang.js?ver=7oct23-1') }}"></script>
  @yield('page-style-files')
  --}}
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link wavatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="img-avatar"><img src="{{ asset('img/logo.png') }}" ></span> <span class="nombreytipo"><usuario></usuario> <i class="fa fa-caret-down"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <div class="dropdown-header text-center">
            <strong>Usuario: <types></types></strong>
          </div>
          <a class="dropdown-item" href="#"><i class="icon-user"></i> Perfil</a>
          <div class="divider"></div>
          <a class="dropdown-item" href="javascript:logOut();"><i class="icon-logout"></i> Cerrar sesión</a>
        </div>
      </li>
    </ul>
  </header>

  <div class="app-body">
    <div class="sidebar">
      <nav class="sidebar-nav">
        <ul class="nav">
          <li class="nav-title">
            Catálogos <img src="{{ asset('img/arrow.png') }}">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="icon-organization"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-people"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-folder"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-tag"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-layers"></i> &nbsp;</a>
          </li>

          <li class="nav-title">
            Operaciones <img src="{{ asset('img/arrow.png') }}">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="icon-user-following"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-shield"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-bag"></i> &nbsp;</a>
            <a class="nav-link" href="#"><i class="icon-docs"></i> &nbsp;</a>

            <a class="nav-link" href="#"><i class="icon-docs"></i> Retornos</script></a>
            <a class="nav-link" href="#"><i class="icon-docs"></i> Reasignaciones</a>
          </li>

          <li class="nav-title">
            Otros <img src="{{ asset('img/arrow.png') }}">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="icon-home"></i> Bienvenido</a>
            <a class="nav-link" href="javascript:logOut();"><i class="icon-logout"></i> Cerrar sesión</a>
          </li>

        </ul>
      </nav>
      <!--<button class="sidebar-minimizer brand-minimizer" type="button"></button>-->
    </div>

        <!--*******************************************************************************************-->
            @yield('content')
        <!--*******************************************************************************************-->
      </div>

      {{--
      <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Bootstrap and necessary plugins -->
      <script src="{{ asset('datatables/jQuery-3.7.0/jquery-3.7.0.min.js') }}"></script>
      <script src="{{ asset('vendors/js/popper.min.js') }}"></script>
      <script src="{{ asset('vendors/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('vendors/js/pace.min.js') }}"></script>
      <script src="{{ asset('vendors/js/select2.js') }}"></script>
      <script src="{{ asset('js/app.js') }}"></script>
      <script src="{{ asset('js/litepicker.js') }}"></script>
      <script src="https://kit.fontawesome.com/25b733a6d1.js" crossorigin="anonymous"></script>
      <script src="{{ asset('js/validate.js?ver=7oct23-1') }}"></script>
      <script src="{{ asset('js/utils.js?ver=7oct23-1') }}"></script>
      <script src="{{ asset('js/entities.js?ver=7oct23-1') }}"></script>

      <script language="javascript">
          //for all windows
          var urlStart="";  //"{{route('start')}}";
          var urlInicio=""; //"{{route('inicio')}}";
          saveUrl();
          getUser();
          $("usuario").html(nombre+" "+apellido);
          //$("types").html(translate('esp',types.join(', ')));
          $("types").html("Bienvenido");
      </script>
      @yield('page-js-script')
      <script>
        $(document).ready(function () {
          $.navigation = $('nav > ul.nav');
          $.navigation.find('a').each(function(){
            var cUrl = String(window.location).split('?')[0];
            if (cUrl.substr(cUrl.length - 1) == '#') {
              cUrl = cUrl.slice(0,-1);
            }
            var exists = pattern.test($(this)[0].href);
            if(exists){
              $(this).addClass('active');
              $(this).parent().addClass('active');
              $(this).parent().prev('li.nav-title').addClass('active');
            }
          });

          $('.sidebar-nav .nav-title').on('click', function(event){
            var $this = $(this);
            if (!$this.hasClass('active')) {
              $('.sidebar-nav .nav-item').slideUp(400);
              $('.sidebar-nav .nav-title').removeClass('active');
              $this.next('li').slideDown(400);
              $this.next('li').addClass('active');
              $this.addClass('active');
            }
            else{
              $this.next('li').slideUp(400,function(){
                $this.next('li').removeClass('active');
              });
              $this.removeClass('active');
            }
          });
        });
      </script>
      --}}
  </body>
</html>
