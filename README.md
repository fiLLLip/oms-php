Brings TELENOR SMS in Outlook Mobile Service SOAP API to PHP

Sends SMS via TELENOR OMS-compliant gateway.

Usage:
```php
$myNumber = '12345678';
$myPassword = 'my-serviceguide-password';
$recipientNumber = '12345678';
$text = 'Hi there';

$c = new OMS(new OMS_User($myNumber,$myPassword),
	'https://telenormobil.no/smapi/services/omsv3_service'
);

$m = new OMS_Message(new OMS_Body_SMS($text),$recipientNumber);
$c->DeliverXms($m);
```
For more advanced example see index.php