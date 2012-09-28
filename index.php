<?php
function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}
set_error_handler("exception_error_handler"); //Library really counts on a rethrow like that. Don't disappoint it, please.


require_once 'oms.php';
$myNumber = '12345678'; // Your 8-digit norwegian number
$u = new OMS_User($myNumber,'my-serviceguide-password'); // Your password to "Mine sider"

$recipient = '23456789'; //Recipients 8-digit number

try{
    $c = new OMS($u,
        'https://telenormobil.no/smapi/services/omsv3_service'
    );
    
}catch(OMS_Exception $e){
    die('Login should be like your number, and a service guide password as that password');
}

var_dump($c->GetServiceInfo()); // This is not needed, but useful for debugging

$m = new OMS_Message(new OMS_Body_SMS('Hi fella'),$myNumber);

// Modified the DeliverXms to return true or false
if ($c->DeliverXms($m)) {
	echo 'true';
}
else {
	echo 'false';
}

?>