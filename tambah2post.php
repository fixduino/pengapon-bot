
<?php //pengapon http://www.dapuralena.com/bot_pon/tambah.php?ids=SC0001&pesan=haloo
   date_default_timezone_set('Asia/Jakarta');
   include("dbcon.php");
   if(isset($_POST['ids'])and($_POST['pesan'])) {
	
   	$s = time ();
	$dt1=date("H:i:s",$s);
    $tgljam =date("Y-m-d H:i:s",$s);
	
	$null="";
    $ids1=$_POST['ids'];
	$pesan1=$_POST['pesan'];
	$on="ON";
	$off="OFF";
	$cmd="";

	 echo "<br>";echo "<br>";	
     echo "['sensorid:',";
		echo "$ids1";echo " ---- ";
		echo "]";
		echo "['pesan:',";
		echo "$pesan1";
		echo "]";


    $Sql="insert into tbterima (sensorid, waktu, pesan)  values ( '".$ids1."','".$tgljam."','".$pesan1."')";
     mysql_query($Sql);
			
	


$token_bot="435941597:AAEyUqKiYxoF-n3JAEUQ6izSDu76RUaeuro"; //216353971:AAHyd_ZKzWFAUeSGI2fdkQJfdhmLZYLG0G0
$data['chat_id']=-1001104734937; 
//mico-1001078936434  chan-1001132052378 taufik307734416 grupanyar-1001082866479
//grup cr new: -1001104734937

$data['text']=$ids1.":".$pesan1; 
function kirimperintah($perintah,$token_bot,array $keterangan=null) 
{ 
$url="https://api.telegram.org/bot".$token_bot."/"; 
$url.=$perintah."?"; 
$ch=curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_POSTFIELDS,$keterangan); 
$output = curl_exec($ch); 
curl_close($ch); 
return $output; 
} 
/*
$data2['chat_id']=-1001132052378; 
//mico-1001078936434  chan-1001132052378 taufik307734416 grupanyar-1001082866479
$data2['text']=$ids1.":".$pesan1; 
function kirimperintah($perintah,$token_bot,array $keterangan=null) 
{ 
$url="https://api.telegram.org/bot".$token_bot."/"; 
$url.=$perintah."?"; 
$ch=curl_init(); 
curl_setopt($ch,CURLOPT_URL,$url); 
curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch,CURLOPT_POSTFIELDS,$keterangan); 
$output = curl_exec($ch); 
curl_close($ch); 
return $output; 
} */
kirimperintah("sendMessage",$token_bot,$data); 

//kirimperintah("sendMessage",$token_bot,$data2); 
echo 'done';

	}
    else {

          $result=mysql_query("select * from tbterima order by id desc");//,$link);
    }

?>

