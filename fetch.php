<?php
 
require_once __DIR__ . '/vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Kms\KmsClient;

$s3_client = S3Client::factory(array(
	'version' => 'latest',
	'region' => 'us-east-1',
	'credentials' => array(
	'key'    => '',
	'secret' => ''
	))
);

$kms_client = KmsClient::factory(array(
'version' => 'latest',
'region' => 'us-east-1',
'credentials' => array(
'key'    => '',
'secret' => ''
))
);

$username = $s3_client->getObject(array(
'Bucket' => 'cloudproject2final',
'Key'    => 'db_username.txt',
));

$password = $s3_client->getObject(array(
'Bucket' => 'cloudproject2final',
'Key'    => 'db_password.txt',
));

$endpoint = $s3_client->getObject(array(
'Bucket' => 'cloudproject2final',
'Key'    => 'db_endpoint.txt',
));

$dec_username = $kms_client->decrypt(array('CiphertextBlob' => $username['Body']))["Plaintext"];
$dec_password = $kms_client->decrypt(array('CiphertextBlob' => $password['Body']))["Plaintext"];
$dec_endpoint = $kms_client->decrypt(array('CiphertextBlob' => $endpoint['Body']))["Plaintext"];
putenv('dbusername=$dec_username');
putenv('dbpassword=$dec_password');
putenv('dbendpoint=$dec_endpoint');


?>
