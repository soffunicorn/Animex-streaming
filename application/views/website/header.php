<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Anime Series y Películas">
      <meta name="author" content="Media Master">
      <title>ANIMEX | Series y Peliculas</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
      <!-- Custom styles for this template -->
      <link  href="<?=base_url();?>plantilla/sitioweb/css/portfolio-item.css" rel="stylesheet">
      <link rel="stylesheet"  href="<?=base_url();?>plantilla/sitioweb/css/style.css">
   </head>
   <style type="text/css">
      .mb-3{
      margin-bottom:1.5em;
      }
      .mb-4 {
      margin-bottom:0.99em;
      }
      th {
      text-align: center;
      }
      td,th, tr {
      padding:5px;
      border-right: 0.5px solid #000;
      }
      table{
      border-left:  1px solid #000;
      }
      table img {
      max-height:50px;
      }
   </style>
   <body>
      <header>
         <nav class="navbar navbar-fixed escritorio navbar-fixed-top" id="nav-regis">
            <div class="container">
               <div class="row">
                  <div class="col-sm-4">
                     <div class="navbar-header">
                        <a class="navbar-brand" href="#">WebSiteName</a>
                     </div>
                     <ul class="nav navbar-nav">
                        <li class="active"><a href="#" class="icon-link"><i class="far fa-gamepad icon-nav"></i> Noticias</a></li>
                        <li><a href="#" class="icon-link"><i class="fas fa-home icon-nav"></i> Directorio</a></li>
                        <li><a href="#" class="icon-link"><i class="far fa-comments icon-nav"></i> Chat anime</a></li>
                     </ul>
                  </div>
                  <div class="col-sm-3">
                     <form class="navbar-form navbar-left" action="/action_page.php">
                        <div class="input-group">
                           <input type="text" id="input-nav" class="form-control" placeholder="Search" name="search">
                           <div class="input-group-btn">
                              <button class="btn btn-default btn-nav" type="submit">
                              <i class="glyphicon glyphicon-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-sm-5">
                     <ul class="nav navbar-nav">
                        <li class="active"><a href="#"><i class="fas fa-mobile-alt icon-nav"></i> Aplicacion</a></li>
                        <li><a href="#" class="log">Login/</a><span class="registrar-btn"><a href="#"> Registrar</a></span></li>
                        <li><a href="#"> Chat anime</a></li>
                        <li><a href="#"><i class="far fa-clock icon-nav2"></i></a></li>
                        <li><a href="#"><i class="far fa-star icon-nav2"></i></a></li>
                        <li><a href="#"><i class="fas fa-download icon-nav2"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </nav>
         <nav class="navbar-default" id="navmovil">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xs-12">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="#" style="width:500px">WebSiteName</a>
                  </div>
                  <div class="collapse container col-sm-12 row" id="myNavbar">
                     <ul class="nav navbar-nav text-center col-xs-12">
                        <li><a href="#"><i class="far fa-gamepad icon-nav" style="margin-top:40px;"></i> Noticias</a></li>
                        <li><a href="#"><i class="fas fa-home icon-nav"></i> Directorio</a></li>
                        <li><a href="#"><i class="far fa-comments icon-nav"></i> Chat anime</a></li>
                        <li><a href="#"><i class="fas fa-mobile-alt icon-nav"></i> Aplicacion</a></li>
                        <li class="panel-body"><a href="#" class="log">Login/</a><span class="registrar-btn"><a href="#">Registrar</a></span></li>
                        <li><a class="span" href="#"><i class="far fa-clock icon-nav2"></i></a>
                           <a class="span" href="#"><i class="far fa-star icon-nav2"></i></a>
                           <a class="span" href="#"><i class="fas fa-download icon-nav2"></i></a>
                        </li>
                     </ul>
                     <form class="navbar-form navbar-left col-xs-12" action="/action_page.php">
                        <div class="input-group">
                           <input type="text" id="input-nav" class="form-control" placeholder="Search" name="search">
                           <div class="input-group-btn">
                              <button class="btn btn-default btn-nav" type="submit">
                              <i class="glyphicon glyphicon-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </nav>
      </header>