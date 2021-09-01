<?php
  require_once('admin/db_connect.php');
  $newPassword = $_POST['newPass'];
  $newPassword = md5($newPassword);
  mysql_query("UPDATE user SET password='$newPassword' WHERE id_user=1");
  if (!mysql_error()){
    echo "Zmieniono hasło";
  }else {
    echo mysql_error();
  }
?>
