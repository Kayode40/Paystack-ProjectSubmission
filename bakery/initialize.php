
<?php
   

	$name = $_POST['name'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
    $supply = $_POST['supply'];
    $account_number = $_POST['account_number'];
    $bank = $_POST['bank_name'];
    $amount = $_POST['amount'];
    $amount = $amount * 100;
    $bank_code = GetBankCode($bank);
    $string = array ("name"=>"$name", "contact"=>"$contact", "email"=>"$email", "account_number"=>"$account_number", "bank"=>"$bank", "amoun"=>"$amount");
    $data = http_build_query($string);
    $recipient_code = CreateRecipient($name, $bank_code, $account_number);
    $transfer_code = InitializeTransfer($supply, $amount, $recipient_code);
    
    #header("location: confirm.php?$transfer_code");

    function GetBankCode($bank){
        require('config.php');
        $qry = "SELECT * FROM bank WHERE bank_name = '$bank'";
        $cq = mysqli_query($conn,$qry);
        $ret= mysqli_fetch_assoc($cq);
        $bank_code = $ret['bank_code'];
        return $bank_code;


}
    function CreateRecipient($name, $bank_code, $account_number){
        $curl = curl_init();
        curl_setopt_array($curl, array(

        CURLOPT_URL => "https://api.paystack.co/transferrecipient",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_POST => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "type=nuban&account_number=$account_number&bank_code=$bank_code",
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
        $myResponse = json_decode($response,true);
        $status = $myResponse['status'];
        $message = $myResponse['message'];
        if ($status){
            echo "Recipient has been created Succesfully";
        }
        else{
            echo $message;
        }
    }
    $myResponse = json_decode($response,true);
    $transferrecipient_code = $myResponse['data']['recipient_code'];
    return $transferrecipient_code;
}
function InitializeTransfer($supply, $amount, $recipient_code){
$curl = curl_init();
        curl_setopt_array($curl, array(

        CURLOPT_URL => "https://api.paystack.co/transfer",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_POST => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "source=balance&reason=$supply&amount=$amount&recipient=$recipient_code",
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
        $myResponse = json_decode($response,true);
        $status = $myResponse['status'];
        $message = $myResponse['message'];
        if ($status){
            echo "Transfer has been initialized successfully. Logon to you Paystack to complete transaction";
        }
        else{
            echo $message;
        }
    }
    $myResponse = json_decode($response,true);
    $transferrecipient_code = $myResponse['data']['transfer_code'];
    return $transfer_code;
}
?>

<link href="main/style.css" media="screen" rel="stylesheet" type="text/css" />
<a  href="home.php"><button class="btn btn-default btn-small" style="float: center;"> OK</button></a>