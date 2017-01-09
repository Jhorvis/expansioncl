
<!DOCTYPE html>

<?php @session_start();

if (!isset($_SESSION['LgCargoId'])) header("location:index.php");



$cargoid = $_SESSION['LgCargoId'];



require("ajax/clases/claseusuario.php");
$a= new Usuarios();
$numero = $a->contardisponibles();
foreach ($numero as $num) {}

$datopr = $a->moduloproductos($cargoid);
$datocom = $a->modulocompras($cargoid);
$datoprov = $a->moduloproveedores($cargoid);
$datocl = $a->moduloclientes($cargoid);
$datoven = $a->modulovendedores($cargoid);
$datovt = $a->moduloventas($cargoid);
$datoadm = $a->moduloadministracion($cargoid);

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Expansión</title>
    <meta name="description" content="description">
    <meta name="author" content="DevOOPS">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
    <link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
    <link href="plugins/select2/select2.css" rel="stylesheet">
    <link href="plugins/justified-gallery/justifiedGallery.css" rel="stylesheet">
    <link href="css/style_v1.css" rel="stylesheet">
    <link href="plugins/chartist/chartist.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/img/deleted.png" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
        <script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

<body>
<!--Start Header-->
<div id="screensaver">
  <canvas id="canvas"></canvas>
  <i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
  <div class="devoops-modal">
    <div class="devoops-modal-header">
      <div class="modal-header-name">
        <span>Basic table</span>
      </div>
      <div class="box-icons">
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <div class="devoops-modal-inner">
    </div>
    <div class="devoops-modal-bottom">
    </div>
  </div>
</div>
<header class="navbar">
  <div class="container-fluid expanded-panel">
    <div class="row">
      <div id="logo" class="col-xs-12 col-sm-2">
        <a href="home.php">Expansión Chile</a>
      </div>
      <div id="top-panel" class="col-xs-12 col-sm-10">
        <div class="row">
          <div class="col-xs-8 col-sm-4">
            <div id="search">
              <input type="text" placeholder="search"/>
              <i class="fa fa-search"></i>
            </div>
          </div>
          <div class="col-xs-4 col-sm-8 top-panel-right">
            <a href="#" class="about">tema</a>
            <a href="home2.php" class="style2"></a>
            <ul class="nav navbar-nav pull-right panel-menu">
              <li class="hidden-xs">
                <a href="#" class="modal-link">
                  <i class="fa fa-bell"></i>
                  <span class="badge"><?php
                  if ($num->Disponibles > 9){

                    echo "+";

                  }else {
                                  echo $num->Disponibles;
                                }
                  ?></span>
                </a>
              </li>
              <li class="hidden-xs">
                <a class="ajax-link" href="ajax/calendar.html">
                  <i class="fa fa-calendar"></i>
                  <span class="badge"></span>
                </a>
              </li>
              <li class="hidden-xs">
                <a href="ajax/page_messages.html" class="ajax-link">
                  <i class="fa fa-envelope"></i>
                  <span class="badge"></span>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                  <div class="avatar">
                    <img src="img/avatar.jpg" class="img-circle" alt="avatar" />
                  </div>
                  <i class="fa fa-angle-down pull-right"></i>
                  <div class="user-mini pull-right">
                    <span class="welcome">Bienvenido, </span>
                    <span><?php  echo @$_SESSION['nombre'];?>!</span>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="ajax/page_messages.html" class="ajax-link">
                      <i class="fa fa-envelope"></i>
                      <span>Messages</span>
                    </a>
                  </li>
                  <li>
                    <a href="ajax/gallery_simple.html" class="ajax-link">
                      <i class="fa fa-picture-o"></i>
                      <span>Albums</span>
                    </a>
                  </li>
                  <li>
                    <a href="ajax/calendar.html" class="ajax-link">
                      <i class="fa fa-tasks"></i>
                      <span>Tasks</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <a href="logout.php">
                      <i class="fa fa-power-off"></i>
                      <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--End Header-->

<!--Start Container-->
<div id="main" class="container-fluid">
  <div class="row">
    <div id="sidebar-left" class="col-xs-2 col-sm-2">
      <ul class="nav main-menu">
        <li>
          <a href="ajax/dashboard.php" class="ajax-link">
            <i class="fa fa-home"></i>
            <span class="hidden-xs">Home</span>
          </a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-bar-chart-o"></i>
            <span class="hidden-xs">Estadisticas</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="ajax-link" href="#">xCharts</a></li>
            <li><a class="ajax-link" href="#">Flot Charts</a></li>
            <li><a class="ajax-link" href="#">Google Charts</a></li>
            <li><a class="ajax-link" href="#">Morris Charts</a></li>
            <li><a class="ajax-link" href="#">AmCharts</a></li>
            <li><a class="ajax-link" href="#">Chartist</a></li>
            <li><a class="ajax-link" href="#">CoinDesk realtime</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-table"></i>
             <span class="hidden-xs">Tablas</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="ajax-link" href="ajax/tables_simple.html">Simple Tables</a></li>
            <li><a class="ajax-link" href="ajax/tables_datatables.html">Data Tables</a></li>
            <li><a class="ajax-link" href="ajax/tables_beauty.html">Beauty Tables</a></li>
          </ul>
        </li>
        <?php if ($datopr){ ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-dropbox"></i>
             <span class="hidden-xs">Productos</span>
          </a>
          
          <ul class="dropdown-menu">
          <?php foreach ($datopr as $pr){ ?>
            <li><a class="ajax-link" href="<?php echo $pr->url;?>"><?php echo $pr->submodulo;?></a></li>
         
            <?php } ?>
          </ul>
        </li>
        <?php } if ($datocom){ ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-shopping-cart"></i>
             <span class="hidden-xs">Compras</span>
          </a>
          <ul class="dropdown-menu">
             <?php foreach ($datocom as $com){ ?>
            <li><a class="ajax-link" href="<?php echo $com->url;?>"><?php echo $com->submodulo;?></a></li>
         
            <?php } ?>
          </ul>
        </li>

         <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-suitcase"></i>
             <span class="hidden-xs">Proveedores</span>
          </a>
          <ul class="dropdown-menu">
             <?php foreach ($datoprov as $prov){ ?>
            <li><a class="ajax-link" href="<?php echo $prov->url;?>"><?php echo $prov->submodulo;?></a></li>
         
            <?php } ?>
            </ul>
        </li>
        <?php } if ($datocl){ ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-users"></i>
             <span class="hidden-xs">Clientes</span>
          </a>
          <ul class="dropdown-menu">
            <?php foreach ($datocl as $cl){ ?>
            <li><a class="ajax-link" href="<?php echo $cl->url;?>"><?php echo $cl->submodulo;?></a></li>
         
            <?php } ?>
          </ul>
        </li>
        <?php } if ($datoven){ ?>
				  <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-male"></i>
             <span class="hidden-xs">Vendedores</span>
          </a>
          <ul class="dropdown-menu">
            <?php foreach ($datoven as $ven){ ?>
            <li><a class="ajax-link" href="<?php echo $ven->url;?>"><?php echo $ven->submodulo;?></a></li>
         
            <?php } ?>
            </ul>
        </li>
        <?php } if ($datovt){ ?>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-usd"></i>
             <span class="hidden-xs">Ventas</span>
          </a>
          <ul class="dropdown-menu">
             <?php foreach ($datovt as $vt){ ?>
            <li><a class="ajax-link" href="<?php echo $vt->url;?>"><?php echo $vt->submodulo;?></a></li>
         
            <?php } ?>
          </ul>
        </li>


      <!--  <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-list"></i>
             <span class="hidden-xs">Pages</span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="ajax/page_login_v1.html">Login</a></li>
            <li><a href="ajax/page_register_v1.html">Register</a></li>
            <li><a id="locked-screen" class="submenu" href="ajax/page_locked.html">Locked Screen</a></li>
            <li><a class="ajax-link" href="ajax/page_contacts.html">Contacts</a></li>
            <li><a class="ajax-link" href="ajax/page_feed.html">Feed</a></li>
            <li><a class="ajax-link add-full" href="ajax/page_messages.html">Messages</a></li>
            <li><a class="ajax-link" href="ajax/page_pricing.html">Pricing</a></li>
            <li><a class="ajax-link" href="ajax/page_product.html">Product</a></li>
            <li><a class="ajax-link" href="ajax/page_invoice.html">Invoice</a></li>
            <li><a class="ajax-link" href="ajax/page_search.html">Search Results</a></li>
            <li><a class="ajax-link" href="ajax/page_404.html">Error 404</a></li>
            <li><a href="ajax/page_500_v1.html">Error 500</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-map-marker"></i>
            <span class="hidden-xs">Maps</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="ajax-link" href="ajax/maps.html">OpenStreetMap</a></li>
            <li><a class="ajax-link" href="ajax/map_fullscreen.html">Fullscreen map</a></li>
            <li><a class="ajax-link" href="ajax/map_leaflet.html">Leaflet</a></li>
          </ul>
        </li>-->
       <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-picture-o"></i>
             <span class="hidden-xs">Catálogo</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="ajax-link" href="ajax/catalogo_simple.php">Catálogo Simple</a></li>
            <li><a class="ajax-link" href="ajax/catalogo_completo.php">Catálogo Completo</a></li>
          </ul>
        </li>-->
        <?php } if ($datoadm){ ?>
           <li class="dropdown">
          <a href="#" class="dropdown-toggle">
            <i class="fa fa-user"></i>
             <span class="hidden-xs">Adminsitración</span>
          </a>
          <ul class="dropdown-menu">
             <?php foreach ($datoadm as $adm){ ?>
            <li><a class="ajax-link" href="<?php echo $adm->url;?>"><?php echo $adm->submodulo;?></a></li>
         
            <?php } ?>
          </ul>
        </li>
        <li>
         <?php }  ?>
          <a class="ajax-link" href="ajax/calendar.html">
             <i class="fa fa-calendar"></i>
             <span class="hidden-xs">Calendario</span>
          </a>
         </li>
        
    </div>
    <!--Start Content-->
    <div id="content" class="col-xs-12 col-sm-10">
      <div id="about">
        <div class="about-inner">
          <h4 class="page-header">Open-source admin theme for you</h4>
          <p>DevOOPS team</p>
          <p>Homepage - <a href="http://devoops.me" target="_blank">http://devoops.me</a></p>
          <p>Email - <a href="mailto:devoopsme@gmail.com">devoopsme@gmail.com</a></p>
          <p>Twitter - <a href="http://twitter.com/devoopsme" target="_blank">http://twitter.com/devoopsme</a></p>
          <p>Donate - BTC 123Ci1ZFK5V7gyLsyVU36yPNWSB5TDqKn3</p>
        </div>
      </div>
      <div class="preloader">
        <img src="img/devoops_getdata.gif" class="devoops-getdata" alt="preloader"/>
      </div>
      <div id="ajax-content"></div>
    </div>
    <!--End Content-->
  </div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/justified-gallery/jquery.justifiedGallery.min.js"></script>
<script src="plugins/tinymce/tinymce.min.js"></script>
<script src="plugins/tinymce/jquery.tinymce.min.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="js/devoops.js"></script>
</body>
</html>


