<?php 
function prepareCheckout() {
	$url = "https://test.oppwa.com/v1/checkouts";
	$data = "authentication.userId=8a8294184b4f2868014b4f86f767015d" .
		"&authentication.password=F8T7N4PD" .
		"&authentication.entityId=8a8294184b4f2868014b4f87bf160173" .
		"&paymentType=DB" .
		"&amount=50.99" .
		"&currency=EUR";
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return json_decode($response)->id;
}
$checkoutId = prepareCheckout();
?>
<!DOCTYPE html>
<head>
	<title>COPYandPAY PHP</title>
	<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?php echo $checkoutId; ?>"></script>
</head>
<body>
	<form action="http://localhost/status.php" class="paymentWidgets">VISA MASTER</form>
</body>
</html>