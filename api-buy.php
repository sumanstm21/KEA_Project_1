<?php
if(!isset($_POST['subject'])
){
    echo 'message name must be at least 2 chars';
    exit();
}
$sFromPhone = '71573546';
$sToPhone = '71573546';
$sCode = $_POST["bookingCode"];
$sMessage =  urlencode('Your booking code is :  '.$sCode);
// echo strlen($sMessage);
if( strlen($sMessage) > 100){
    echo 'too much length';
    exit();
}
$sApiKey = '5tH9ZXJPyibXVDEgF6AMH7DBAfK9K7GgxL7FDdbmC7o0lZ8zgp'; // 5tH9ZXJPyibXVDEgF6AMH7DBAfK9K7GgxL7FDdbmC7o0lZ8zgp
// echo 'x';
// echo 'Ariline Name: '.$_POST['txtArilineName'];
//  echo file_get_contents("https://fatsms.com/apis/api-send-sms?to-phone=71573546&message=$sMessage&from-phone=71573546&api-key=5tH9ZXJPyibXVDEgF6AMH7DBAfK9K7GgxL7FDdbmC7o0lZ8zgp");