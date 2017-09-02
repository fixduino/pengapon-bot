<?php

//https://api.telegram.org/bot435941597:AAEyUqKiYxoF-n3JAEUQ6izSDu76xxxx/sendMessage?telegramchatid=-10010xxxx&text=hello");


$telegrambot='435941597:AAEyUqKiYxoF-n3JAEUQ6ixxxx';
$telegramchatid=-1001082xxxx;
$bot_url="https://api.telegram.org/bot$telegrambot/";
$url=$bot_url."sendPhoto?telegramchatid=".$telegramchatid;

$foto = 'airplane.png';


$post_fields = array(
  'chat_id'   => $telegramchatid,
    'photo'     => new CURLFile(realpath($foto))
);

while(true){
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type:multipart/form-data"
));
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields); 
$output = curl_exec($ch);
curl_close ($ch);
echo $output;
sleep(30);
}
?>