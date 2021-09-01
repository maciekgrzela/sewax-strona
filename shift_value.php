<?php
  require_once('admin/db_connect.php');
  $newValue = $_POST['newValue'];
  $wtc = $_POST['what_to_change'];
  mysql_query("UPDATE elements SET value='$newValue' WHERE label='$wtc'") or die ('zla query');
?>
