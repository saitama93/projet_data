<?php

header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page. Ici, il s'agit juste de texte brut (text/plain). 

$variable1 = (isset($_POST["variable1"])) ? $_POST["variable1"] : forme;
$variable2 = (isset($_POST["variable2"])) ? $_POST["variable2"] : forme;
$variable3 = (isset($_POST["variable3"])) ? $_POST["variable3"] : forme;

$nomRecu = $variable1;
$mailRecu = $variable2;
$messageRecu = $variable3;

$to  = 'duirfrfr@msn.com';
//$from = '80fe6aa055-9959ef@inbox.mailtrap.io';
$subject = 'test formulaire';

$message = '
     <html>
      <head>
      </head>
      <body>
       <h1>Nouveau inscrit</h1>
       <p><strong>Nom :</strong>'.$nomRecu.'</p>
       <p><strong>Mail :</strong>'.$mailRecu.'</p>
       <p><strong>Message :</strong>'.$messageRecu.'</p>
      </body>
     </html>
     ';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

if ($variable1 && $variable2 && $variable3 != NULL) {
	mail($to, $subject, $message, implode("\r\n", $headers));
	echo "Le mail à été envoyé avec succes";
	}

?>