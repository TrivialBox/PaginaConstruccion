<?php
//PROCESS NEWSLETTER FORM HERE

if(!isset($_POST) || !isset($_POST['email']))
{
    $msg = 'No se ha recibido ningún dato.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

if($_POST['email'] == '')
{
    //ERROR: FIELD "email" EMPTY
    $msg = 'Ingrese un email válido.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

$regex = "^([a-z0-9._-]+)@((outlook)|(gmail)|(yahoo)|(hotmail))\.([a-z]{2,5})";

if (!preg_match($regex, $_POST['email']))
{
    $msg = 'Tu email luce un poco extraño... Prueba con uno más común.';
    echo '<div class="alert alert-danger"><p><i class="fa fa-exclamation-triangle"></i> '.$msg.'</p></div>';
    return false;
}

///////////////////////////////////////////////
//Now yo can save subscriber in your database//
//And send confirmation email if necessary...//
///////////////////////////////////////////////

//Option 1) Send confirmation email. More info here: http://php.net/manual/es/function.mail.php

/*
mail("my_email@exemple.com","New subscriber","Email: ".$_POST['email']);
*/

//Option 2) Save subscriber on TXT file. More info here: http://www.w3schools.com/php/php_file_create.asp

/*
$myfile = fopen("subscribers.txt", "a") or die("Unable to open file!");
$txt = $_POST['email']."\n";
fwrite($myfile, $txt);
fclose($myfile);
*/

//And send success message:
$msg = 'Se ha subscrito exitosamente.';
echo '<div class="alert alert-success"><p><i class="fa fa-check"></i> '.$msg.'</p></div>';
return true;

?>
