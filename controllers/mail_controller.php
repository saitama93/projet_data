
<?php


$variable1 = (isset($_POST["variable1"])) ? $_POST["variable1"] : NULL;
$variable2 = (isset($_POST["variable2"])) ? $_POST["variable2"] : NULL;
$variable3 = (isset($_POST["variable3"])) ? $_POST["variable3"] : NULL;

$nomRecu = $variable1;
$mailRecu = $variable2;
$messageRecu = $variable3;
//echo $nomRecu;





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



$to  = 'duirfrfr@msn.com';
//$from = '80fe6aa055-27d920@inbox.mailtrap.io';
$subject = 'nouveau message';

$message = '
     <html>
      <head>
      </head>
      <body>
       <h1>Dernier inscrit</h1>
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
	echo "Le message à été envoyé avec succes";
	}
