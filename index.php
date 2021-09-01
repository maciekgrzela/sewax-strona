<?php
  require_once('admin/db_connect.php');
  mysql_query("SET CHARACTER SET UTF8");
  $records = mysql_query('SELECT label, value FROM elements');
  $values = array();
  $i = 1;
  $values[0] = 0;
  while ($value = mysql_fetch_array($records)){
    $values[$i] = $value[1];
    $i++;
  }
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>PROFI Kielce</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,700,900italic,400italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&subset=greek,greek-ext" rel="stylesheet">
    <link href="fonts/font-awesome.css" rel="stylesheet" />
    <link href="css/least.min.css" rel="stylesheet" />
    <link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
    <link rel="manifest" href="icons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <script src="js/least/jqueryForLeast/jquery.min.js"></script>
    <script src="./tinymce/js/tinymce/tinymce.min.js"></script>
    <!--<script>
      tinymce.init({ 
        selector:'div.admin_edit',
        relative_urls: true 
      });
    </script>-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container navbar-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img alt="SewaxLogo" src="images/profiLogo.png" class="navbar-logo" />
                </a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#main">Strona Główna</a></li>
                    <li><a href="#gallery">Galeria</a></li>
                    <li><a href="#contact">Kontakt</a></li>
                    <!--<li><a href="#about">O Mnie</a></li>
                    <li><a href="#prices">Cennik</a></li>-->
                    <?php
                      if (isset($_COOKIE['login'])){
                        echo '<li><button class="btn btn-default logout">Admin: Wyloguj</button></li>';
                        echo '<li><button class="btn btn-default password ">Admin: Zmień hasło</button></li>';
                      }
                    ?>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <div id="main" class="container-fluid main lbl18" style="background-image: url('images/<?php echo $values[18] ?>')">
      <?php
      if (isset($_COOKIE['login'])){
        echo '<button class="btn btn-default change changeBackground" type="button" value="lbl18"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
      }
      ?>
    </div>
    <div id="infoBar" class="container-fluid">
        <div class="row infoPanel">
            <div class="col-md-4 col-xs-12 text-center redPanel">
                <p class="clearMargin">
                    <i class="fa fa-money" aria-hidden="true"></i><span class="lbl1"><?php echo " ".$values[1] ?> <?php
                      if (isset($_COOKIE['login'])){
                        echo '<button class="btn btn-default change" type="button" value="lbl1"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                      }
                    ?></span>
                </p>
            </div>
            <div class="col-md-4 col-xs-12 text-center greenPanel">
                <i class="fa fa-check-square-o" aria-hidden="true"></i> <span class="lbl2"><?php echo " ".$values[2] ?> <?php
                  if (isset($_COOKIE['login'])){
                    echo '<button class="btn btn-default change" type="button" value="lbl2"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                  }
                ?></span>
            </div>
            <div class="col-md-4 col-xs-12 text-center bluePanel">
                <i class="fa fa-sliders" aria-hidden="true"></i> <span class="lbl3"> <?php echo " ".$values[3] ?> <?php
                  if (isset($_COOKIE['login'])){
                    echo '<button class="btn btn-default change" type="button" value="lbl3"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                  }
                ?></span>
            </div>
        </div>
    </div>
    <div id="gallery" class="container">
        <div class="row text-center">
            <div class="col-xs-12">
                <p class="lbl4"><?php echo " ".$values[4] ?> <?php
                  if (isset($_COOKIE['login'])){
                    echo '<button class="btn btn-default change" type="button" value="lbl4"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                  }
                ?></p>

                <span class="desc lbl5"><?php echo " ".$values[5] ?> <?php
                  if (isset($_COOKIE['login'])){
                    echo '<button class="btn btn-default change" type="button" value="lbl5"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                  }
                ?></span>
                <p class="offer lbl6"><?php echo " ".$values[6] ?><?php
                  if (isset($_COOKIE['login'])){
                    echo '<button class="btn btn-default change" type="button" value="lbl6"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                  }
                ?></p>
            </div>
        </div>
        <div id="least">
            <div style="padding-top:50px;">
                <div class="least-preview"></div>
            </div>
            <ul class="least-gallery">
                <?php
                  $sel = mysql_query('SELECT name, thumbnail FROM images')or die('zła query');
                  $i = 1;
                  while($images = mysql_fetch_array($sel)){
                    if ($i < 10){
                      $class = 'num';
                    }else if($i >= 10 && $i < 100){
                      $class= 'num2dig';
                    }else {
                      $class = 'num3dig';
                    }
                    echo "<li><a href='images/full/$images[0]' title='Produkt nr. $i' data-subtitle='' data-caption='Produkt numer $i'><img src='images/300x300/$images[1]' alt='Alt Image Text' class='thumbnail th-mini' /><div class='number'></div><p class='num $class'>$i</p></a></li>";
                    if(isset($_COOKIE['login'])){
                        echo '<button class="btn btn-default change corner" type="button" name="'.$images[1].'" value="img'.$i.'"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                        echo '<button class="btn btn-danger delete cornerDel" type="button" name="'.$images[1].'" value="img'.$i.'"><i class="fa fa-times fa-2x" aria-hidden="true"></i></button>';
                    }
                    $i++;
                  }
         ?>
            </ul>
        </div>
    </div>
    <?php
      if(isset($_COOKIE['login'])){
        echo '<div id="newIMG" class="container-fluid text-center">
          <button type="button" class="btn btn-success change" value="new_img">Dodaj nowe zdjęcie</button>
        </div>';
      }
    ?>
    <div id="contact" class="container-fluid">
        <div class="container-fluid">
            <div class="well">
                <div class="row">
                    <div class="col-md-6 col-xs-12 contactform_desc text-center">
                      <span class="lbl7" style="display: none"><?php echo $values[7] ?></span>
                        <i class="fa fa-<?php echo $values[7] ?> fa-7x" aria-hidden="true"> <?php
                          if (isset($_COOKIE['login'])){
                            echo '<button class="btn btn-default change" type="button" value="lbl7"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                          }
                        ?></i>
                        <h3 class="contactform_desc_head lbl8"><?php echo $values[8] ?> <?php
                          if (isset($_COOKIE['login'])){
                            echo '<button class="btn btn-default change" type="button" value="lbl8"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                          }
                        ?></h3>
                        <p class="contactform_desc_short lbl9">
                            <?php echo $values[9] ?>
                            <?php
                              if (isset($_COOKIE['login'])){
                                echo '<button class="btn btn-default change" type="button" value="lbl9"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                              }
                            ?></p>
                    </div>
                    <div class="col-md-6 col-xs-12 contactform_form">
                        <form class="form-horizontal" role="form" id="ajax-contact" method="POST" action="mailer.php">
                          <div class="form-group field">
                            <label class="control-label col-sm-2 lbl10" for="Name">
                              <?php echo $values[10] ?>
                              <?php
                                  if (isset($_COOKIE['login'])){
                                    echo '<button class="btn btn-default change" type="button" value="lbl10"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                                  }
                              ?>
                            </label>
                            <div class="col-sm-10">
                                    <input type="text" class="material" id="name" placeholder="Twoje imię" name="name" required>
                            </div>
                          </div>
                          <div class="form-group field">
                            <label class="control-label col-sm-2 lbl11" for="product">
                              <?php echo $values[11] ?>
                              <?php
                                if (isset($_COOKIE['login'])){
                                  echo '<button class="btn btn-default change" type="button" value="lbl11"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                                }
                              ?>
                            </label>
                            <div class="col-sm-10">
                              <input type="text" class="material" id="product" placeholder="Podaj numer produktu o który chcesz zapytać" name="product">
                            </div>
                          </div>
                          <div class="form-group field">
                            <label class="control-label col-sm-2 lbl19" for="location">
                              <?php echo $values[19] ?>
                              <?php
                                if (isset($_COOKIE['login'])){
                                  echo '<button class="btn btn-default change" type="button" value="lbl19"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                                }
                              ?>
                            </label>
                            <div class="col-sm-10">
                              <input type="text" class="material" id="location" placeholder="Podaj nazwę swojej miejscowości" name="location" required>
                            </div>
                          </div>
                          <div class="form-group field">
                            <label class="control-label col-sm-2 lbl12" for="contactData">
                              <?php echo $values[12] ?>
                              <?php
                                if (isset($_COOKIE['login'])){
                                  echo '<button class="btn btn-default change" type="button" value="lbl12"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                                }
                              ?>
                            </label>
                            <div class="col-sm-10">
                              <input type="text" class="material" id="contactData" placeholder="Podaj numer telefonu lub adres email" name="contactData" required>
                            </div>
                          </div>
                          <div class="form-group field">
                            <label class="control-label col-sm-2 lbl13" for="query"><?php echo $values[13] ?> <?php
                                  if (isset($_COOKIE['login'])){
                                    echo '<button class="btn btn-default change" type="button" value="lbl13"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                                  }
                                ?>
                            </label>
                            <div class="col-sm-10">
                              <textarea class="material" rows="2" id="query" placeholder="Treść twojego zapytania" name="query"></textarea>
                            </div>
                          </div>
                          <div class="form-group field">
                            <div class="col-sm-12">
                              <button type="submit" class="btn btn-lg btn-outline-primary pull-right">Wyślij <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                              <button type="reset" class="btn btn-lg btn-default pull-right clear">Czyść <i class="fa fa-eraser" aria-hidden="true"></i></button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="form-messages"></div>
        </div>
    </div>
    <!--<div id="about" class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <p class="about_header text-white text-center lb20">
           <?php/* echo $values[20];
            if (isset($_COOKIE['login'])){
                echo '<button class="btn btn-default change" type="button" value="lb20"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
            }
          */?>
          </p>
        </div>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-md-6 col-xs-12 vcenter text-center">
          <i class="fa fa-<?php/* echo $values[22]*/ ?> lbl21 fa-12x img-responsive text-center user-icon" aria-hidden="true"></i>
          <?php/*
            if (isset($_COOKIE['login'])){
                echo '<button class="btn btn-default change" type="button" value="lbl21"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>'; 
            }*/
          ?>
        </div><!--
        --><!--<div class="col-md-6 col-xs-12 vcenter">
          <p class="text-justify lbl22 text-white"><?php /*echo $values[21];
            if (isset($_COOKIE['login'])){
                echo '<button class="btn btn-default change" type="button" value="lbl22"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
            }*/
          ?></p>
        </div>
      </div>
      </div>
    </div>-->
    <!--<div id="prices" class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <p class="about_header text-center lbl23">
          <?php
            /*echo $values[23];
            if (isset($_COOKIE['login'])){
                echo '<button class="btn btn-default change" type="button" value="lbl23"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
            }*/
          ?>
          </p>
          <div class="tab_prices lbl24 container">        
            <div class="container content">
	<div class="row">
		<!-- Pricing -->
		<!--<div class="col-md-3">
			<div class="pricing hover-effect">
				<div class="pricing-head">
					<h3>Regał "XXXXX"</h3>
					<h4><i>od </i>400<i>zł</i>
					<span>
					Tekst przykładowy </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						Wymiary: 
					</li>
					<li>
						Materiał:
					</li>
					<li>
						Pojemność:
					</li>
					<li>
						Waga:
					</li>
					<li>
						Inne przykładowe parametry:
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
					</p>
					<a href="javascript:;" class="btn yellow-crusta">
					Zapytaj
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="pricing hover-effect">
				<div class="pricing-head">
					<h3>Szafa "YYYYY"</h3>
					<h4><i>od</i>800<i>zł</i>
					<span>
					Tekst przykładowy </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						Wymiary: 
					</li>
					<li>
						Materiał:
					</li>
					<li>
						Pojemność:
					</li>
					<li>
						Waga:
					</li>
					<li>
						Inne przykładowe parametry:
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
					</p>
					<a href="javascript:;" class="btn yellow-crusta">
					Zapytaj
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="pricing pricing-active hover-effect">
				<div class="pricing-head pricing-head-active">
					<h3>Półka "PPPPPP"</h3>
					<h4><i>od</i>500<i>zł</i>
					<span>
					Tekst przykładowy </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						Wymiary: 
					</li>
					<li>
						Materiał:
					</li>
					<li>
						Pojemność:
					</li>
					<li>
						Waga:
					</li>
					<li>
						Inne przykładowe parametry:
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
					</p>
					<a href="javascript:;" class="btn yellow-crusta">
					Zapytaj
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="pricing hover-effect">
				<div class="pricing-head">
					<h3>Regał "ZZZZZZ"</h3>
					<h4><i>od</i>700<i>zł</i>
					<span>
					Tekst przykładowy </span>
					</h4>
				</div>
				<ul class="pricing-content list-unstyled">
					<li>
						Wymiary: 
					</li>
					<li>
						Materiał:
					</li>
					<li>
						Pojemność:
					</li>
					<li>
						Waga:
					</li>
					<li>
						Inne przykładowe parametry:
					</li>
				</ul>
				<div class="pricing-footer">
					<p>
						 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna psum olor .
					</p>
					<a href="javascript:;" class="btn yellow-crusta">
					Zapytaj
					</a>
				</div>
			</div>
		</div>
		<!--//End Pricing -->
	</div>
</div>
          </div>
</div>
        </div>
      </div>
    </div>
    <div id="stats" class="container-fluid">
        <p class="text-center statCounter">Stronę odwiedzono:
            <script src="http://www.licz.pl/counter.php?name=SEWAX_COUNTER&amp;start=0"></script> razy</p>
    </div>
    <div id="footer" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 text-center adress-container">
                    <p class="adress lbl14"><?php echo $values[14] ?> <?php
                      if (isset($_COOKIE['login'])){
                        echo '<button class="btn btn-default change" type="button" value="lbl14"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                      }
                    ?></p>
                    <p class="adress lbl15"><?php echo $values[15] ?> <?php
                      if (isset($_COOKIE['login'])){
                        echo '<button class="btn btn-default change" type="button" value="lbl15"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                      }
                    ?></p>
                    <p class="adress lbl16"><?php echo $values[16] ?> <?php
                      if (isset($_COOKIE['login'])){
                        echo '<button class="btn btn-default change" type="button" value="lbl16"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                      }
                    ?></p>
                    <p class="adress lbl17 lowercase"><?php echo $values[17] ?> <?php
                      if (isset($_COOKIE['login'])){
                        echo '<button class="btn btn-default change" type="button" value="lbl17"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i></button>';
                      }
                    ?></p>
                </div>
                <div class="col-md-6 col-xs-12 text-center map-container">
                    <iframe class="map-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.164480499583!2d20.651053315313277!3d50.84663836661967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471789d15c1fb74b%3A0x32800ff7e2ada243!2zVcWCYcWEc2thIDQ3LCBLaWVsY2U!5e0!3m2!1spl!2spl!4v1453906940779" width="350" height="250" frameborder="0" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <span class="val" style="display: none"></span>
          <form role="form" method="POST">
            <div class="form-group">
              <label for="shift">Wprowadź nowy tekst:</label>
              <textarea class="form-control" rows="5" id="shift" name="shift"></textarea>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-send-shift">Zapisz zmiany</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
            </div>
          </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header darkTitle">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="white">&times;</span></button>
        <h4 class="modal-title">Zmień właściwość</h4>
      </div>
      <div class="modal-body dark">
        <form id="upload" method="post" action="uploadBG.php" enctype="multipart/form-data">
          <input type="hidden" name="old" class="lbl" />
      <div id="drop">
        <input type="hidden" class="lbl" />
				Przeciągnij i upuść LUB
				<a>Przeglądaj</a>
				<input type="file" name="upl" multiple />
			</div>
			<ul></ul>
		</form>
    <div class="row text-center">
      <button type="button" class="btn btn-primary refresh text-center">ODŚWIEŻ ABY ZOBACZYĆ EFEKT</button>
    </div>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Czy na pewno?</h4>
  </div>
  <div class="modal-body">
      <form role="form" method="POST">
        <div class="form-group">
          <input type="hidden" name="toDelete" class="del" />
          <button type="button" class="btn btn-danger btn-send-delete">Tak</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
        </div>
      </form>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Zmień hasło:</h4>
  </div>
  <div class="modal-body">
      <form role="form" method="POST">
        <div class="form-group">
          <div class="form-group">
            <label for="pwd">Hasło:</label>
            <input type="password" class="form-control pass" id="pwd" placeholder="Podaj nowe hasło">
          </div>
          <button type="button" class="btn btn-danger btn-send-update-pass">Zmień hasło</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
        </div>
      </form>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <script src="js/jquery.knob.js"></script>
    <script src="js/jquery.ui.widget.js"></script>
		<script src="js/jquery.iframe-transport.js"></script>
		<script src="js/jquery.fileupload.js"></script>
    <script src="js/script.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/mailer.js"></script>
    <script src="js/least/least.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
    <script>
        $(document).ready(function () {
            $('.least-gallery').least();
        });
    </script>
</body>
</html>
