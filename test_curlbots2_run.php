<?php //https://api.telegram.org/bot435941597:AAEyUqKiYxoF-n3JAEUQ6izSDu76RUaeuro/sendMessage?chat_id=-1001082866479&text=haiii

  $ids2="pump-01";
	$pesan2="OFF";
	//$data=$ids2
$botToken="435941597:AAEyUqKiYxoF-n3JAEUQ6izSDu76RUaeuro";
$website="https://api.telegram.org/bot".$botToken;
$chatId=-1001082866479;  //Receiver Chat Id 
$params=[
    'chat_id'=>$chatId,
    'text'=>$ids2.':'.$pesan2,
];



// for($x=1;$x<=30000;$x++){
	while (true){
    // $ch=curl_init();
    // curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type:multipart/form-data"));
    // curl_setopt($ch,CURLOPT_URL,$url);
    // curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    // curl_setopt($ch,CURLOPT_POSTFIELDS,$post_fields);
    // $result=json_decode(curl_exec($ch),true);
    // if($result['ok']===true){unlink($file);break;}
    // sleep($x*3);
	
	
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);

sleep(60);
}

?>