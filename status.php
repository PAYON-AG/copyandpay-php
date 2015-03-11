<?php
function getPaymentStatus($checkoutId) {
	$url = "https://test.oppwa.com/v1/checkouts/" . $checkoutId . "/payment";
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return json_decode($response, true);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>COPYandPAY PHP</title>
</head>
<body>
	<?php
	if (isset($_POST["id"])) {
		$status = getPaymentStatus($_POST["id"]);
		if (substr($status["result"]["code"], 0, 3) === "000")
		{
			echo "SUCCESS <br/><br/> Here is the result of your transaction: <br/><br/>";
			print_r($status);
		}
		else
		{
			echo "ERROR <br/><br/> Here is the result of your transaction: <br/><br/>";
			print_r( $status);
		}
	}
	?>
</body>
</html>