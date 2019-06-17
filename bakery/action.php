<?php

if (isset($_REQUEST['submit']))
{
$acc = $_POST['acc'];
$bak = $_POST['pass'];
$amt = $_POST['amt'];

echo $acc;
echo '<br><br>';
echo $bak;
echo '<br><br>';
echo $amt;

echo '<br><br>====================<br><br>';

CreateTransfer($acc,$bak,$amt);
}



function CreateTransfer($acc,$bak,$amt)
{
	
define("ACCOUNT_NUMBER",'0100000010');
define("BANK_CODE",$bak);
define("TYPE",'nuban');
define("NAME",'Man');
	
$curl = curl_init();

curl_setopt_array($curl, array(

  

  CURLOPT_URL => "https://api.paystack.co/transferrecipient?type=nuban&name=man&account_number=0100000010&bank_code=044",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_3b5242110d86a6e1825c13d74b722e4051716251",
    "Cache-Control: no-cache",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
  echo "CURL Error #:" . $err;
} 
else 
{
  
  echo '<br><br>Success<br><br>';
  echo '<br><br>CURL RESPONSE_1 = '.$response.'<br><br>';
  
  $myResponse = json_decode($response,true);
  
  var_dump($myResponse);
  echo 'var_dump($myResponse);==========<br><br>=====================';
  
  $getRC = $myResponse['data'][0];
  
  var_dump($getRC);
  echo 'var_dump($getRC);==========<br><br>===============';
  
  $transferrecipient_code = $getRC['recipient_code'];
  echo $transferrecipient_code;
  
  InitialiseTransfer($transferrecipient_code,$amt);
}

}

function InitialiseTransfer($transferrecipient_code,$amt)
{
$curl = curl_init();

define("SOURCE",'balance');
define("REASON",'Calm down');
define("AMOUNT",$amt);
define("RECIPIENT",$transferrecipient_code);

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transfer?source=SOURCE&reason=REASON&amount=AMOUNT&recipient=RECIPIENT",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_3b5242110d86a6e1825c13d74b722e4051716251",
    "Cache-Control: no-cache",
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) 
{
  echo "CURL Error #:" . $err;
} 
else 
{
  
  echo '<br><br>Success<br><br>';
  echo '<br><br>CURL RESPONSE_2 = '.$response.'<br><br>';
}

}

?>




<link href="main/style.css" media="screen" rel="stylesheet" type="text/css" />
<a  href="home.php"><button class="btn btn-default btn-small" style="float: center;"> OK</button></a>