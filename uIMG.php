<?php
require_once('admin/db_connect.php');
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif', 'JPG', 'jpeg');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'images/full/'.$_FILES['upl']['name'])){
    /*$old = $_POST['old_img'];
    mysql_query("UPDATE images SET name='AAA', thumbnail='AAA' WHERE name='img1.JPG'") or die ('zła query');
    $mainPicture = 'images/full/'.$_FILES['upl']['name'].'';
    $createPicture = imagecreatefromjpeg($mainPicture);
    $main_h = imageSX($createPicture);
    $main_w = imageSY($createPicture);
    $generated_h = 300;
    $generated_w = 300;

    $generatedPicture = imagecreatetruecolor($generated_h, $generated_w);
    imagecopyresampled($generatedPicture, $createPicture, 0,0,0,0,$generated_h, $generated_w, $main_h, $main_w);
    imagejpeg($generatedPicture, 'images/300x300/'.$_FILES['upl']['name'].'', 100);
    imagedestroy($generatedPicture);
		*/
    echo '{"status":"success"}';
		exit;
	}
}

echo '{"status":"error"}';
exit;
