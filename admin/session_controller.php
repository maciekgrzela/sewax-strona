<?php
  require_once('db_connect.php');
  $login = $_POST['login'];
  $status = $_POST['session_status'];
  $password = $_POST['password'];

  $loginQuery = mysql_query("SELECT login, password FROM user WHERE id_user=1") or die ('Zła query');

  if(mysql_num_rows($loginQuery) > 0){
    $record = mysql_fetch_assoc($loginQuery);
    if ($record['login'] == $login && $record['password'] == md5($password)){
      setcookie("login", "OK", time()+3600, '/');
      $status = "OK";
      echo $status;
    }else {
      $status = "WP";
      echo $status;
    }
  }
?>
