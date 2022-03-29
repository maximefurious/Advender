<html>
<head>
    <title>Les formulaires</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta http-equiv="refresh" content="1;URL=http://nsi3.lycee-serusier.fr/advender/contact.html">
</head>
<body>

    <?php
    $destinataire = 'maxime.boujeant@gmail.com';
    $expediteur = $_POST['email'];

    $objet = $_POST['subject'];

    $headers  = 'MIME-Version: 1.0' . "\n";
    $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n";
    $headers .= 'To: '.$destinataire."\n";
    $headers .= 'From: "ADVENDER"<'.$expediteur.'>'."\n";

    $message =  $_POST['message'];

    if(mail($destinataire, $objet, $message, $headers))
    {
        echo '<script languag="javascript" >alert("Votre message a bien été envoyé ");</script>';
    }
    else
    {
        echo '<script languag="javascript">alert("Votre message n\'a pas pu être envoyé");</script>';
    }
    header('Location: contact.html');

    ?>

</form>

</body>
</html>    