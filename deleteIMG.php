<?php
  require_once('admin/db_connect.php');
  $delete = $_POST['delete'];
  mysql_query("DELETE from images WHERE name='$delete'");
  echo '{"status", "success"}';
?>
