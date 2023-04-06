<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$catteryname = strip_tags(htmlspecialchars($_POST['catteryname']));
$phonenumber = strip_tags(htmlspecialchars($_POST['phonenumber']));

$to = "jens.leirens@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "Nieuw bericht van het website contact formulier.\n\n".
"Hier zijn de details:\n\n
Naam: $name\n\n
Email: $email\n\n
telefoonnummer: $phonenumber\n\n
cattery name: $catteryname\n\n
Onderwerp: $m_subject\n\n
Bericht: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
