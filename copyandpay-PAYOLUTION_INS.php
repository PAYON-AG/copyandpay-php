<?php 
function prepareCheckout() {
	$url = "https://test.oppwa.com/v1/checkouts";
	$data = "authentication.userId=8a8294174b7ecb28014b9699220015cc" .
		"&authentication.password=sy6KJsT8" .
		"&authentication.entityId=8a8294174b7ecb28014b9699a3cf15d1" .
		"&paymentType=PA" .
		"&amount=10.00" .
		"&currency=EUR" .
		"&customer.surname=Jones" .
		"&customer.givenName=Jane" .
		"&customer.birthDate=1970-01-01" .
		"&billing.city=Test" .
		"&billing.country=DE" .
		"&billing.street1=123 Test Street" .
		"&billing.postcode=TE1 2ST" .
		"&customer.email=test@test.com" .
		"&customer.phone=1234567890" .
		"&customer.ip=123.123.123.123" .
		"&customParameters[PAYOLUTION_ITEM_PRICE_1]=2.00" .
		"&customParameters[PAYOLUTION_ITEM_DESCR_1]=Test item #1" .
		"&customParameters[PAYOLUTION_ITEM_PRICE_1]=3.00" .
		"&customParameters[PAYOLUTION_ITEM_DESCR_1]=Test item #2" .
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