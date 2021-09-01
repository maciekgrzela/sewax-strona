<?php
  if (isset($_COOKIE['login'])){
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROFI CMS v1.0 login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
var roz = new Date().getTime()-(<?php echo date(U); ?>*1000);

function zegar(){
miesiace= new Array ('Stycznia', 'Lutego', 'Marca', 'Kwietnia', 'Maja', 'Czerwca', 'Lipca', 'Sierpnia', 'Września', 'Października', 'Listopada', 'Grudnia')
D = new Date();
D.setTime(D.getTime()-roz);
G = D.getHours();
M = D.getMinutes(); M=M<10?'0'+M:M;
S = D.getSeconds(); S=S<10?'0'+S:S;
r = D.getFullYear();
m = miesiace[D.getMonth()];
d = D.getDate();

document.getElementById('time').innerHTML=' '+ G + ':' + M + ':' + S;
document.getElementById('date').innerHTML=' '+ d + ' ' + m + ' ' + r + ' ' + 'roku'
setTimeout('zegar()', 1000);
}
</script>
  </head>

  <body onload="zegar()">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Panel Administratora PROFI Kielce</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a id="time"></a></li>
            <li><a id="date"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container">

      <form class="form-signin" name="form-signin" method="POST">
        <h2 class="form-signin-heading">Zaloguj się:</h2>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="sr-only">Hasło</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Hasło" required>
        <input class="btn btn-lg btn-primary btn-block btn-send" type="button" value="Zaloguj">
      </form>
      <div class="alert alert-danger">
        <strong>Niestety!</strong> Podałeś zły login lub hasło.
      </div>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/login.js"></script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
