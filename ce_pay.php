<?
/* IMPORTANT WARNING! - Do not retrieve any of the transaction details using the POST variables. */
/* IMPORTANT WARNING! - Do not retrieve any of the transaction details using the POST variables. */
/* IMPORTANT WARNING! - Do not retrieve any of the transaction details using the POST variables. */
// This file shows how you can retrieve the transaction status via the api using CURL

function getStatus($transref,$mertid,$type='',$sign){
	$request = 'mertid='.$mertid.'&transref='.$transref.'&respformat='.$type.'&signature='.$sign; //initialize the request variables
	$url = 'https://www.cashenvoy.com/sandbox2/?cmd=requery'; //this is the url of the gateway's test api
	//$url = 'https://www.cashenvoy.com/webservice/?cmd=requery'; //this is the url of the gateway's live api
	$ch = curl_init(); //initialize curl handle
	curl_setopt($ch, CURLOPT_URL, $url); //set the url
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); //return as a variable
	curl_setopt($ch, CURLOPT_POST, 1); //set POST method
	curl_setopt($ch, CURLOPT_POSTFIELDS, $request); //set the POST variables
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//change to true when live
	$response = curl_exec($ch); // grab URL and pass it to the browser. Run the whole process and return the response
	curl_close($ch); //close the curl handle
	return $response;
}



//edit here:key transref
$key = 'example';
$transref = 'DM123456789012';
$mertid = 1;
$type = ''; //Data return format. Options are xml or json. leave blank if you want data returned in string format.
$cdata = $key.$transref.$mertid;
$signature = hash_hmac('sha256', $cdata, $key, false);
$response = getStatus($transref,$mertid,$type,$signature);

/*------------------------------------- processing response in string format -------------------------*/

$response = strip_tags(preg_replace('#(<title.*?>).*?(</title>)#', '$1$2', $response));
$data = explode('-',$response);
$cnt = count($data);
if($cnt==3){
	$returned_transref = $data[0];
	$returned_status = $data[1];
	$returned_amount = $data[2];
	//always remember to cross-check the amount in your database with that returned by the webservice
	//provide service for successful transaction only if the amount returned by cashenvoy matches what you have in your db
} else {
	$error = $data[0];
}
/*------------------------------------------------------------------------------------------------------*/

/*------------------------------------- processing response in json format ---------------------------*/
/*
PHP 5 >= 5.2.0, PECL json >= 1.2.0
Go to http://php.net/manual/en/function.json-decode.php for more information */
/*
$data = json_decode($response);
foreach ($data as $subdata) { @$cnt++; }
if($cnt==3){
	$returned_transref = $data->{'TransactionId'};
	$returned_status = $data->{'TransactionStatus'};
	$returned_amount = $data->{'TransactionAmount'};
	//always remember to cross-check the amount in your database with that returned by the webservice
	//provide service for successful transaction only if the amount returned by cashenvoy matches what you have in your db
} else {
	$error = $data->{'TransactionStatus'};
}
------------------------------------------------------------------------------------------------------*/

/* For response in xml format, there is no built-in PHP function to handle this. A variety of methods are available on the internet for purpose of handling XML documents. */
?>
