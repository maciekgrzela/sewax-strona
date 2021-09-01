<?php
require_once('admin/db_connect.php');
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if ($_POST['old'] !== "lbl18"){
			if(move_uploaded_file($_FILES['upl']['tmp_name'], 'images/full/'.$_FILES['upl']['name'])){
				$old = $_POST['old'];
				$picture = $_FILES['upl']['name'];
				if ($_POST['old'] == "new"){
						mysql_query("INSERT INTO images (name, thumbnail) VALUES ('$picture', '$picture')");
				}else {
						mysql_query("UPDATE images SET name='$picture', thumbnail='$picture' WHERE name='$old'") or die ('zła query');
				}
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
				exit;
			}
	}else{
		if(move_uploaded_file($_FILES['upl']['tmp_name'], 'images/'.$_FILES['upl']['name'])){
				$name = $_FILES['upl']['name'];
				mysql_query("UPDATE elements SET value='$name' WHERE label='lbl18'") or die ('zla query');
			exit;
		}
	}
}

echo '{"status":"error"}';
exit;
