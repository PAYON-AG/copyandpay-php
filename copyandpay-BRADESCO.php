<?php 
function prepareCheckout() {
	$url = "https://test.oppwa.com/v1/checkouts";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&paymentType=PA" .
		"&amount=10.00" .
		"&currency=BRL" .
		"&customParameters[BRADESCO_cpfsacado]=11111111111" .
		"&billing.country=BR" .
		"&billing.postcode=12345678" .
		"&billing.state=SP" .
		"&billing.street1=Amazonstda" .
		"&billing.city=Brasilia" .
		"&customer.givenName=Braziliano" .
		"&customer.surname=Babtiste"  .
		"&testMode=EXTERNAL";
	
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
echo $checkoutId;
?>