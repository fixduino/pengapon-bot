<?php //pengapon http://www.dapuralena.com/bot_pon/tambah.php?ids=SC0001&pesan=haloo
   date_default_timezone_set('Asia/Jakarta');
   include("dbcon.php");
   if(isset($_GET['ids'])and($_GET['pesan'])) {
	
   	$s = time ();
	$dt1=date("H:i:s",$s);
    $tgljam =date("Y-m-d H:i:s",$s);
	
	$null="";
    $ids1=$_GET['ids'];
	$pesan1=$_GET['pesan'];
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
$data['chat_id']=-1001082866479; //mico-1001078936434  chan-1001132052378 taufik307734416 grupanyar-1001082866479

$data['text']=$ids1.":".$pesan1; 

/*function kirimperintah($perintah,$token_bot,array $keterangan=null) 
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

kirimperintah("sendMessage",$token_bot,$data); 
*/

//exec('http://www.dapuralena.com/bot_pon/tambah.php?ids=SC0001&pesan=haloo');
 // header("location:send.php?ids=$ids1&pesan=$pesan1");
 header("location:test_curlbots2.php?ids=$ids1&pesan=$pesan1");
 // header("location:test_curlbots2.php?ids=$ids1&pesan=$pesan1");



echo 'done';

	}
    else {

          $result=mysql_query("select * from tbterima order by id desc");//,$link);
    }

?>