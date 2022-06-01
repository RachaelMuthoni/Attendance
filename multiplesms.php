<?php
//Send an SMS using Gatewayapi.com
$url = "https://gatewayapi.com/rest/mtsms";
$api_token = "hPswUqx3Q5Cs6mf8j96XMuk7uoyIks8s-makYlCjtXbv0OmlD8MYJyd_27Ttqzow";

//Set SMS recipients and content
$recipients = "SELECT mobile FROM student";
$result = mysqli_query($conn,$sql);
$datas = array()
if(mysqli_num_rows($result)> 0){
	while ($row = mysqli_fetch_assoc($result)) {
		$datas[] = $row;
		# code...
	}
}

$json = [
    'sender' => 'DEKUT',
    'message' => 'Hello, dear parent? We are glad to be getting this information to you. Your child is doing great in class attendance. Thanks.',
    'recipients' => [],
];
foreach ($recipients as $msisdn) {
    $json['recipients'][] = ['msisdn' => $msisdn];
}

//Make and execute the http request
//Using the built-in 'curl' library
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
curl_setopt($ch,CURLOPT_USERPWD, $api_token.":");
curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($json));
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
print($result);
$json = json_decode($result);
print_r($json->ids);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Send message</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<div class="col-md-8 col-md-offset-2">
		<div class = "col-md-8 col-md-offset-2">
			<h3 style="text-transform: uppercase;">Send an attendance notification message to parents</h3>
			
		</div>
		
	</div>
	
</nav>
<div>
	<button id="one"; style="color:green; border-radius:10px; text-align: center;">Send Message
	</button>

</div>
	
</body>
</html>