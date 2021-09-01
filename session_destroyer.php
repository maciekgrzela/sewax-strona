<?php
  if (isset($_COOKIE['login'])){
    setcookie("login", "OK", time()-3600, '/');
  }
?>
