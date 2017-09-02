<?php //https://api.telegram.org/bot435941597:AAEyUqKiYxoF-n3JAEUQ6izSDu76RUaeuro/sendMessage?chat_id=-1001082866479&text=haiii

 if(isset($_GET['ids'])and($_GET['pesan'])) {
	 $ids2=$_GET['ids'];
	$pesan2=$_GET['pesan'];
	//$data=$ids2
$botToken="435941597:AAEyUqKiYxoF-n3JAEUQ6izSDu76RUaeuro";
$website="https://api.telegram.org/bot".$botToken;
$chatId=-1001082866479;  //Receiver Chat Id 
$params=[
    'chat_id'=>$chatId,
    'text'=>$ids2.':'.$pesan2,
];
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);
 }
?>