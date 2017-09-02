<?php //http://www.dapuralena.com/lampubni/tambah.php?ids=sc0001&pesan=tes to user
$host="localhost";
$user="root";
$password="";
$database="dapd1669_pon";

$item_per_page = 10;
//$connecDB = mysqli_connect($host, $user, $password,$database)or die('could not connect to database'); //for pagination

if (!defined('SERVERNAME')) define('SERVERNAME', 'localhost');
    if (!defined('USERNAME')) define('USERNAME', 'root');
    if (!defined('PASSWORD')) define('PASSWORD', '');
    if (!defined('DBNAME')) define('DBNAME', 'dapd1669_pon');

    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, 'dapd1669_pon');




ini_set('display_errors',FALSE);
$koneksi=mysql_connect($host,$user,$password);
mysql_select_db($database,$koneksi);
//cek koneksi
if($koneksi){
	echo "berhasil koneksi";
}else{
	echo "gagal koneksi";
}



?>

