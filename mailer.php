<?php
    require 'PHPMailerAutoload.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $name = strip_tags(trim($_POST["name"]));
        $name = str_replace(array("\r", "\n"),array(" ", " "), $name);
        $product = trim($_POST["product"]);
        $location = trim($_POST["location"]);
        $contactData = trim($_POST["contactData"]);
        $query = trim($_POST["query"]);

        if (empty($name) OR empty($product) OR empty($location) OR empty($contactData) OR empty($query)){
            http_response_code(400);
            echo "Nastąpił problem z wysyłaniem wiadomości email. Przejdź na stronę główną";
            exit; 
        }

        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->Username = "maciekgrzela45@gmail.com";
        $mail->Password = "maciuk33";


        $mail->From = 'maciekgrzela@outlook.com';
        $mail->FromName = 'PROFI Kielce';
        $mail->AddAddress('profi.kielce@o2.pl', 'PROFI Kielce');
        $mail->CharSet = 'UTF-8';
        
        
        $mail->Body = "Zapytanie od klienta<br />Imię: $name<br />Nazwa produktu: $product<br />Numer telefonu lub email: $contactData<br />Lokalizacja: $location<br />Treść zapytania: $query";
        $mail->AltBody = "Zapytanie od klienta Imię: $name Nazwa produktu: $product Numer telefonu lub email: $contactData Lokalizacja: $location Treść zapytania: $query";

        if(!$mail->Send()){
            http_response_code(500);
            echo "Ups. Wystąpił Błąd. Proszę spróbować ponownie później";
        }else {
            http_response_code(200);
            echo "Gratulacje. Wiadomość została wysłana pomyślnie";
        }

    } else {
        http_response_code(403);
        echo "Nastąpił problem z wysyłaniem wiadomości email. Przejdź na stronę główną";
    }
?>