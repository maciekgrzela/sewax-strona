<?php
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$imie = $_POST['nameToSend'];$numerProduktu = $_POST['productToSend'];$numerTelefonu = $_POST['contactToSend'];$tresc = $_POST['contentToSend'];
$mail->IsSMTP();$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->Username = "maciekgrzela45@gmail.com";
$mail->Password = "maciuk33";


$mail->From         = 'donotreply@mydomain.com';$mail->FromName     = 'PROFI Kielce';

$mail->AddAddress('profi.kielce@o2.pl', 'PROFI Kielce');  // Add a recipient$mail->IsHTML(true);$mail->Subject = 'Zapytanie od klienta';$mail->WordWrap = 50;
$mail->Body = "Zapytanie od klienta<br />Imie: $imie<br  />Numer produktu: $numerProduktu<br />Numer telefonu lub email: $numerTelefonu<br />Tresc zapytania: $tresc";
$mail->AltBody = "Zapytanie od klienta Imie: $imie Numer produktu: $numerProduktu Numer telefonu lub email: $numerTelefonu Tresc zapytania: $tresc";

if(!$mail->Send()) {   echo 'Wystąpił błąd. Prosimy spróbować ponownie później';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Wiadomość została wysłana. Wkrótce się z tobą skontaktujemy';
?>
